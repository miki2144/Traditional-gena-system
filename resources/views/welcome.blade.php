<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                body {
                    background-image: url('{{ asset('imags/pp.jpg') }}'); /* Correct image path */
                    background-size: cover; /* Ensures the image covers the full page */
                    background-position: center; /* Centers the background image */
                    background-repeat: no-repeat; /* Prevents the image from repeating */
                    height: 100vh; /* Makes the body take up the full height of the viewport */
                    margin: 0; /* Removes the default margin */
                }
                /* Additional styles for the buttons */
                .auth-buttons a {
                    display: inline-block;
                    background-color: #4CAF50; /* Green for login */
                    color: white;
                    padding: 14px 32px;
                    margin: 10px 5px;
                    border-radius: 30px;
                    font-size: 16px;
                    font-weight: bold;
                    text-align: center;
                    text-decoration: none;
                    transition: background-color 0.3s ease, transform 0.3s ease;
                }

                /* Hover effects */
                .auth-buttons a:hover {
                    background-color: #45a049;
                    transform: scale(1.05);
                }

                .auth-buttons .register {
                    background-color: #FF5733; /* Red for register */
                }

                .auth-buttons .register:hover {
                    background-color: #e64a2e;
                }
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <!-- Your content here -->
        @if (Route::has('login'))
            <nav class="-mx-3 flex flex-1 justify-center auth-buttons">
                @auth
                    <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Dashboard
                    </a>
                @else
                    <!-- Login Button -->
                    <a href="{{ route('login') }}" class="rounded-md text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                        Log in
                    </a>

                    <!-- @if (Route::has('register')) -->
                        <!-- Register Button -->
                        <!-- <a href="{{ route('register') }}" class="register rounded-md text-white ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"> -->
                            <!-- Register -->
                        <!-- </a>
                    @endif -->
                @endauth
            </nav>
        @endif
    </body>
</html>
