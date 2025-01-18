<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Container Styling */
        .login-container {
            background-image: url('{{ asset('imags/a.jpg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Card Styling */
        .card {
            width: 100%;
            max-width: 400px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 30px;
            transition: transform 0.3s ease;
            display: flex; /* Flexbox for centering */
            flex-direction: column; /* Stack children vertically */
            align-items: center; /* Center children horizontally */
        }

        /* Card Hover Effect */
        .card:hover {
            transform: translateY(-10px);
        }

        /* Card Header Styling */
        .card-header {
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 15px;
            font-size: 1.5rem;
        }

        /* Form Inputs Styling */
        .form-control {
            border-radius: 50px;
            box-shadow: none;
            transition: border-color 0.3s ease;
            padding: 15px;
            margin-bottom: 15px;
            width: 100%; /* Full width for inputs */
        }

        /* Focus Effect on Input Fields */
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        /* Submit Button Styling */
        .btn-primary {
            border-radius: 25px;
            color: black;
            border: none;
            padding: 10px 20px;
            width: 100%; /* Full width for the button */
            max-width: 200px; /* Limit max width */
            transition: background-color 0.3s ease;
            margin-top: 15px; /* Margin above the button */
        }

        /* Submit Button Hover Effect */
        .btn-primary:hover {
            background-color: #0056b3;
        }

        /* Social Media Icons */
        .social-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }

        .social-icons a {
            font-size: 50px; /* Increased size */
            color: #333;
            transition: color 0.3s ease, transform 0.3s ease; /* Added transform for hover */
        }

        /* Social Media Icon Hover Effect */
        .social-icons a:hover {
            color: red; /* Change hover color to red */
            transform: scale(1.1); /* Scale effect on hover */
        }

        /* Mobile Responsive Styling */
        @media (max-width: 576px) {
            .card {
                padding: 20px;
                width: 90%;
            }

            .card-header {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="card shadow-lg">
            <div class="card-header">{{ __('Login') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                    </div> -->
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                    <!-- <div class="text-center mt-3">
                        <a href="{{ route('register') }}" class="btn btn-link">{{ __('Create an Account') }}</a>
                    </div> -->
                </form>
            </div>
            <div class="card-footer text-center">
                <div class="social-icons">
                    <a href="https://wa.me/" class="fab fa-whatsapp"></a>
                    <a href="https://github.com/miki2144" class="fab fa-github"></a>
                    <a href="https://facebook.com/" class="fab fa-facebook"></a>
                    <a href="https://linkedin.com/" class="fab fa-linkedin"></a>
                    <a href="https://twitter.com/" class="fab fa-twitter"></a>
                    <a href="https://lovein.com/" class="fab fa-heart"></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>