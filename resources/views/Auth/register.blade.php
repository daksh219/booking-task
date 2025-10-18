<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookEase - Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 1200px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .left-panel {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            color: white;
        }

        .left-panel h1 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .left-panel p {
            font-size: 18px;
            margin-bottom: 50px;
            line-height: 1.6;
            opacity: 0.95;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            margin-bottom: 25px;
            font-size: 16px;
        }

        .feature-icon {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 20px;
        }

        .right-panel {
            padding: 80px 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            max-height: 90vh;
            overflow-y: auto;
        }

        .form-header {
            margin-bottom: 40px;
        }

        .form-header h2 {
            font-size: 36px;
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 700;
        }

        .form-header p {
            color: #888;
            font-size: 15px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
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
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e8dcc8;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
        }

        .form-group input::placeholder {
            color: #bbb;
        }

        .error-message {
            display: block;
            font-size: 12px;
            color: #e74c3c;
            margin-top: 6px;
            font-weight: 500;
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
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
            margin-top: 15px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #888;
        }

        .form-footer a {
            color: #667eea;
            text-decoration: none;
            font-weight: 700;
            transition: color 0.3s ease;
        }

        .form-footer a:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .alert {
            padding: 14px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
            border-left: 4px solid;
            animation: slideIn 0.3s ease-out;
        }

        .alert-error {
            background: #fef1f1;
            color: #e74c3c;
            border-left-color: #e74c3c;
        }

        .alert-success {
            background: #f1fef5;
            color: #27ae60;
            border-left-color: #27ae60;
        }

        .alert ul {
            list-style: none;
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

        @media (max-width: 768px) {
            .register-container {
                grid-template-columns: 1fr;
            }

            .left-panel {
                padding: 50px 30px;
            }

            .right-panel {
                padding: 50px 30px;
                max-height: none;
            }

            .left-panel h1 {
                font-size: 32px;
            }

            .left-panel p {
                font-size: 16px;
            }

            .form-header h2 {
                font-size: 28px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <!-- Left Panel -->
        <div class="left-panel">
            <h1>BookEase</h1>
            <p>Join thousands of users who trust BookEase for their booking needs. Start your journey today!</p>

            <div class="feature-item">
                <div class="feature-icon">✨</div>
                <span>Premium Features Included</span>
            </div>

            <div class="feature-item">
                <div class="feature-icon">🔐</div>
                <span>Bank-Level Security</span>
            </div>

            <div class="feature-item">
                <div class="feature-icon">⚡</div>
                <span>Instant Confirmations</span>
            </div>

            <div class="feature-item">
                <div class="feature-icon">🎯</div>
                <span>Flexible Management Tools</span>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="right-panel">
            <div class="form-header">
                <h2>Create Account</h2>
                <p>Join our community and start booking today</p>
            </div>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="first_name" placeholder="John" value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="last_name" placeholder="Doe" value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="your@email.com" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Create a strong password" required>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm your password" required>
                        @error('password_confirmation')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="submit-btn">Create Account</button>
            </form>

            <div class="form-footer">
                Already have an account? <a href="{{ route('login.form') }}">Sign in here</a>
            </div>
        </div>
    </div>
</body>

</html>