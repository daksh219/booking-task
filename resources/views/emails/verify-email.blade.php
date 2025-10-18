<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Email - BookEase</title>
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

        .container {
            width: 100%;
            max-width: 600px;
            background: white;
            border-radius: 15px;
            padding: 60px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            text-align: center;
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

        .logo {
            font-size: 32px;
            font-weight: 700;
            color: #2c3e50;
            letter-spacing: 2px;
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .icon-circle {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 30px;
            font-size: 40px;
        }

        h2 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .subtitle {
            font-size: 16px;
            color: #888;
            margin-bottom: 10px;
        }

        .greeting {
            font-size: 18px;
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 30px;
        }

        .description {
            font-size: 15px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 40px;
        }

        .verify-btn {
            display: inline-block;
            padding: 16px 40px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            transition: all 0.3s ease;
            margin-bottom: 30px;
            cursor: pointer;
            border: none;
        }

        .verify-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.3);
        }

        .verify-btn:active {
            transform: translateY(0);
        }

        .link-section {
            border-top: 2px solid #e8dcc8;
            padding-top: 30px;
            margin-top: 30px;
        }

        .link-text {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .verification-link {
            word-break: break-all;
            background: #f5f1e8;
            padding: 16px;
            border-radius: 6px;
            border-left: 4px solid #667eea;
            font-size: 12px;
            color: #2c3e50;
            font-family: 'Courier New', monospace;
            line-height: 1.6;
            text-align: left;
            margin-bottom: 20px;
        }

        .copy-btn {
            padding: 10px 20px;
            background: #f5f1e8;
            color: #667eea;
            border: 2px solid #667eea;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            transition: all 0.3s ease;
        }

        .copy-btn:hover {
            background: #667eea;
            color: white;
        }

        .expiry-notice {
            background: #fef1f1;
            border-left: 4px solid #e74c3c;
            padding: 15px;
            border-radius: 6px;
            margin-top: 30px;
            font-size: 13px;
            color: #c0392b;
        }

        .support-text {
            margin-top: 30px;
            font-size: 13px;
            color: #888;
        }

        .support-text a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .support-text a:hover {
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .container {
                padding: 40px 25px;
            }

            h2 {
                font-size: 26px;
            }

            .greeting {
                font-size: 16px;
            }

            .verify-btn {
                padding: 14px 30px;
                font-size: 13px;
            }

            .icon-circle {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="logo">BookEase</div>
        
        <div class="icon-circle">✉️</div>

        <h2>Verify Your Email</h2>
        <p class="subtitle">Almost there! Confirm your email address to activate your account</p>

        <p class="greeting">Hello {{ $user->first_name }},</p>

        <p class="description">
            Thank you for registering with BookEase! To complete your account setup and start making bookings, 
            please verify your email address by clicking the button below.
        </p>

        <a href="{{ $verificationUrl }}" class="verify-btn">
            ✓ Verify Email Address
        </a>

        <div class="expiry-notice">
            <strong>⏱️ Important:</strong> This verification link expires in 24 hours. 
            If you didn't create this account, please ignore this email.
        </div>

        <p class="support-text">
            Having trouble? <a href="mailto:support@bookease.com">Contact our support team</a>
        </p>
    </div>

    <script>
        function copyToClipboard() {
            const link = document.querySelector('.verification-link').textContent;
            navigator.clipboard.writeText(link).then(() => {
                const btn = document.querySelector('.copy-btn');
                const originalText = btn.textContent;
                btn.textContent = '✓ Copied!';
                setTimeout(() => {
                    btn.textContent = originalText;
                }, 2000);
            });
        }
    </script>
</body>

</html>