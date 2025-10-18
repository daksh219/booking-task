<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookEase - Make a Booking</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f5f1e8 0%, #e8dcc8 100%);
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
            padding: 20px 40px;
            color: white;   
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .logo-header {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-links {
            display: flex;
            gap: 25px;
        }

        .nav-links a {
            color: #ecf0f1;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .nav-links a:hover {
            color: #d4a04f;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 20px;
                justify-content: space-between;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
            font-size: 14px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background: #d4a04f;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
        }

        .logout-btn {
            padding: 10px 20px;
            background: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .logout-btn:hover {
            background: #c0392b;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        /* Main Content */
        .main-content {
            padding: 60px 40px;
            max-width: 900px;
            margin: 0 auto;
        }

        .container-box {
            background: white;
            border-radius: 12px;
            padding: 60px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-header {
            margin-bottom: 40px;
            text-align: center;
        }

        .form-header h1 {
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .form-header p {
            color: #888;
            font-size: 15px;
        }

        .alert {
            padding: 16px 18px;
            border-radius: 8px;
            margin-bottom: 25px;
            font-size: 13px;
            border-left: 4px solid;
            animation: slideIn 0.3s ease-out;
        }

        .alert-success {
            background: #f1fef5;
            color: #27ae60;
            border-left-color: #27ae60;
        }

        .alert-error {
            background: #fef1f1;
            color: #e74c3c;
            border-left-color: #e74c3c;
        }

        .alert ul {
            list-style: none;
            margin: 0;
        }

        .alert li {
            padding: 4px 0;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 700;
            color: #2c3e50;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e8dcc8;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #fafafa;
            font-family: inherit;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .form-row-three {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
        }

        .form-group.hidden {
            display: none;
        }

        .submit-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .time-inputs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info-text {
            font-size: 12px;
            color: #888;
            margin-top: 8px;
            font-style: italic;
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 20px;
                padding: 20px;
            }

            .header-left {
                flex-direction: column;
                gap: 15px;
                width: 100%;
            }

            .nav-links {
                flex-direction: column;
                gap: 10px;
                width: 100%;
            }

            .header-right {
                width: 100%;
                justify-content: space-between;
            }

            .main-content {
                padding: 30px 20px;
            }

            .container-box {
                padding: 30px 20px;
            }

            .form-header h1 {
                font-size: 26px;
            }

            .form-row,
            .form-row-three {
                grid-template-columns: 1fr;
            }

            .time-inputs {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="header-right">
            <div class="user-info">
                <div class="user-avatar">JD</div>
                <span>John Doe</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="container-box">
            <div class="form-header">
                <h1>Make a Booking</h1>
                <p>Fill in the details below to book your appointment</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <input type="text" name="customer_name" placeholder="John Doe"
                            value="{{ old('customer_name') }}" required>
                        @error('customer_name')
                            <span
                                style="color: #e74c3c; font-size: 12px; margin-top: 6px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Customer Email</label>
                        <input type="email" name="customer_email" placeholder="john@example.com"
                            value="{{ old('customer_email') }}" required>
                        @error('customer_email')
                            <span
                                style="color: #e74c3c; font-size: 12px; margin-top: 6px; display: block;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Booking Date</label>
                    <input type="date" name="booking_date" value="{{ old('booking_date') }}" required>
                    @error('booking_date')
                        <span
                            style="color: #e74c3c; font-size: 12px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Booking Type</label>
                    <select name="booking_type" id="booking_type" required>
                        <option value="">Select Booking Type</option>
                        <option value="full_day" {{ old('booking_type') == 'full_day' ? 'selected' : '' }}>Full Day (9 AM
                            - 5 PM)</option>
                        <option value="half_day" {{ old('booking_type') == 'half_day' ? 'selected' : '' }}>Half Day
                        </option>
                        <option value="custom" {{ old('booking_type') == 'custom' ? 'selected' : '' }}>Custom Time
                        </option>
                    </select>
                    @error('booking_type')
                        <span
                            style="color: #e74c3c; font-size: 12px; margin-top: 6px; display: block;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group hidden" id="slot_group">
                    <label>Select Time Slot</label>
                    <select name="booking_slot" id="booking_slot">
                        <option value="first_half" {{ old('booking_slot') == 'first_half' ? 'selected' : '' }}>First Half
                            (9 AM - 1 PM)</option>
                        <option value="second_half" {{ old('booking_slot') == 'second_half' ? 'selected' : '' }}>Second
                            Half (1 PM - 5 PM)</option>
                    </select>
                    <p class="info-text">Choose between morning or afternoon slot</p>
                </div>

                <div class="form-group hidden" id="time_group">
                    <label>Custom Time Range</label>
                    <div class="time-inputs">
                        <div>
                            <label style="font-size: 12px; margin-bottom: 8px;">Start Time</label>
                            <input type="time" name="start_time" id="start_time" value="{{ old('start_time') }}">
                        </div>
                        <div>
                            <label style="font-size: 12px; margin-bottom: 8px;">End Time</label>
                            <input type="time" name="end_time" id="end_time" value="{{ old('end_time') }}">
                        </div>
                    </div>
                    <p class="info-text">Set your preferred start and end times</p>
                </div>

                <button type="submit" class="submit-btn">Book Now</button>
            </form>
        </div>
    </div>

    <script>
        const bookingType = document.getElementById('booking_type');
        const slotGroup = document.getElementById('slot_group');
        const timeGroup = document.getElementById('time_group');
        const bookingSlot = document.getElementById('booking_slot');
        const startTime = document.getElementById('start_time');
        const endTime = document.getElementById('end_time');

        function toggleFields() {
            slotGroup.classList.add('hidden');
            timeGroup.classList.add('hidden');

            if (bookingType.value === 'half_day') {
                slotGroup.classList.remove('hidden');
            } else if (bookingType.value === 'custom') {
                timeGroup.classList.remove('hidden');
            }
        }

        bookingType.addEventListener('change', toggleFields);
        window.addEventListener('load', toggleFields);
    </script>
</body>

</html>