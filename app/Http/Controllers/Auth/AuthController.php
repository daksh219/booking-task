<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class AuthController extends Controller
{   

    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $verificationUrl = URL::temporarySignedRoute(
            'verify.email',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        Mail::to($user->email)->send(new VerifyEmail($user, $verificationUrl));

        return redirect()->route('bookings.index')->with('success', 'Registration successful. Check your email to verify.');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials']);
        }

        if (!$user->email_verified_at) {
            return back()->withErrors(['email' => 'Please verify your email before login.']);
        }

        Auth::login($user);
        return redirect()->route('bookings.index');
    }

    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals(sha1($user->email), $hash)) {
            return abort(403, 'Invalid verification link.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect()->route('login.form')->with('success', 'Email verified successfully. You can now login.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
    public function dash()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}
