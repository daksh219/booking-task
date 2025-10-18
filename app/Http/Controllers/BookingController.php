<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        // 1️⃣ Validate the request
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'booking_date' => 'required|date',
            'booking_type' => 'required|in:full_day,half_day,custom',
            'booking_slot' => 'nullable|in:first_half,second_half',
            'start_time' => 'nullable|date_format:H:i',
            'end_time' => 'nullable|date_format:H:i|after:start_time',
        ]);

        // 2️⃣ Extract input
        $bookingDate = $request->booking_date;
        $type = $request->booking_type;
        $slot = $request->booking_slot;
        $start = $request->start_time;
        $end = $request->end_time;

        // 3️⃣ Check for conflicting bookings
        $conflict = Booking::where('booking_date', $bookingDate)
            ->where(function ($query) use ($type, $slot, $start, $end) {
                if ($type === 'full_day') {
                    $query->whereNotNull('id'); // Full day blocks all
                } elseif ($type === 'half_day') {
                    $query->where(function ($q) use ($slot) {
                        $q->where('booking_type', 'full_day')
                            ->orWhere(function ($q2) use ($slot) {
                                $q2->where('booking_type', 'half_day')
                                    ->where('booking_slot', $slot);
                            })
                            ->orWhere(function ($q3) use ($slot) {
                                $q3->where('booking_type', 'custom')
                                    ->where(function ($q4) use ($slot) {
                                        if ($slot === 'first_half') {
                                            $q4->whereTime('start_time', '<', '12:00')
                                                ->whereTime('end_time', '>', '00:00');
                                        } else {
                                            $q4->whereTime('start_time', '<', '23:59')
                                                ->whereTime('end_time', '>', '12:00');
                                        }
                                    });
                            });
                    });
                } elseif ($type === 'custom') {
                    $query->where(function ($q) use ($start, $end) {
                        $q->where('booking_type', 'full_day')
                            ->orWhere('booking_type', 'half_day')
                            ->orWhere(function ($q2) use ($start, $end) {
                                $q2->where('booking_type', 'custom')
                                    ->where(function ($q3) use ($start, $end) {
                                        $q3->whereBetween('start_time', [$start, $end])
                                            ->orWhereBetween('end_time', [$start, $end])
                                            ->orWhere(function ($q4) use ($start, $end) {
                                                $q4->where('start_time', '<=', $start)
                                                    ->where('end_time', '>=', $end);
                                            });
                                    });
                            });
                    });
                }
            })
            ->exists();

        if ($conflict) {
            return back()->withErrors([
                'booking_date' => 'This booking conflicts with existing bookings.'
            ])->withInput();
        }

        // 4️⃣ Create booking
        Booking::create([
            'customer_name' => $request->customer_name,
            'customer_email' => $request->customer_email,
            'booking_date' => $bookingDate,
            'booking_type' => $type,
            'booking_slot' => $slot,
            'start_time' => $start,
            'end_time' => $end,
        ]);

        return redirect()->back()->with('success', 'Booking created successfully.');
    }
}
