<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Log in</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #0047BB;
            --secondary-color: #FFD700;
            --accent-color: #38c172;
            --dark-text: #343a40;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-image: linear-gradient(rgba(0, 71, 187, 0.85), rgba(0, 71, 187, 0.85)),
                url('https://images.unsplash.com/photo-1519834064978-9b52d6ca2c8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
        }

        .login-header {
            background: var(--primary-color);
            padding: 25px 20px;
            text-align: center;
            position: relative;
        }

        .login-header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, var(--secondary-color), var(--accent-color));
        }

        .logo {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
        }

        .logo-icon {
            background: var(--secondary-color);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .logo-icon i {
            color: var(--primary-color);
            font-size: 28px;
        }

        .logo-text {
            color: white;
            font-size: 28px;
            font-weight: 700;
        }

        .logo-subtext {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            margin-top: 4px;
        }

        .login-body {
            padding: 30px 25px;
        }

        .welcome-text {
            text-align: center;
            color: var(--dark-text);
            margin-bottom: 25px;
            font-size: 16px;
            font-weight: 500;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .input-with-icon {
            position: relative;
        }

        .form-control {
            width: 100%;
            padding: 14px 45px 14px 45px;
            border: 2px solid #e1e5eb;
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s;
            color: var(--dark-text);
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(0, 71, 187, 0.2);
            outline: none;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
            font-size: 18px;
        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }

        .btn-login {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 14px;
            border-radius: 10px;
            width: 100%;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(0, 71, 187, 0.25);
        }

        .btn-login:hover {
            background: #0039a1;
            box-shadow: 0 6px 15px rgba(0, 71, 187, 0.35);
        }

        .error-feedback {
            color: #e3342f;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        .is-invalid {
            border-color: #e3342f !important;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="logo">
                    <div class="logo-icon">
                        <i class="fas fa-recycle"></i>
                    </div>
                    <div>
                        <div class="logo-text">Waste Wise</div>
                        <div class="logo-subtext">Sustainable Waste Management</div>
                    </div>
                </div>
            </div>

            <div class="login-body">
                <p class="welcome-text">Sign in to access your account</p>

                {{-- Display server-side login error --}}
                @if (session('login_error'))
                    <div class="error-feedback text-center mb-3">
                        <strong>{{ session('login_error') }}</strong>
                    </div>
                @endif

                <form method="POST" action="/auth/user">
                    @csrf
                    <div class="form-group">
                        <div class="input-with-icon">
                            <span class="input-icon"><i class="fas fa-user"></i></span>
                            <input id="username" type="text"
                                class="form-control @error('username') is-invalid @enderror" name="username"
                                value="{{ old('username') }}" placeholder="Username" required autofocus>
                        </div>
                        @error('username')
                            <span class="error-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="input-with-icon">
                            <span class="input-icon"><i class="fas fa-lock"></i></span>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password" required>
                            <span class="toggle-password" onclick="togglePassword()">
                                <i class="fas fa-eye" id="toggleEye"></i>
                            </span>
                        </div>
                        @error('password')
                            <span class="error-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn-login">Sign In</button>
                </form>

                <div class="footer-links mt-3">
                    <p>Need help? <a href="#">Contact Support</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function togglePassword() {
            const password = document.getElementById('password');
            const eye = document.getElementById('toggleEye');
            if (password.type === 'password') {
                password.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                password.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }

        $(document).ready(function() {
            // Highlight errors
            @if (session('login_error'))
                $('.error-feedback').fadeIn();
            @endif
        });
    </script>
</body>

</html>
