@extends('layouts.app')

@section('content')
<div class="container" style="background-image: url('{{ asset('imags/bg.jpg') }}'); background-size: cover; background-position: center; height: 100vh;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-3">
                <div class="card-header text-center bg-success text-white">{{ __('') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end text-white">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control rounded-pill shadow-sm @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end text-white">{{ __('Email Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control rounded-pill shadow-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-white">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control rounded-pill shadow-sm @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end text-white">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control rounded-pill shadow-sm" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success rounded-pill shadow-sm">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
/* Container with background image */
.container {
    background-image: url('{{ asset('imags/bg.jpg') }}');
    background-size: cover;
    background-position: center;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Card styling */
.card {
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    width: 100%;
    max-width: 500px; /* Max width for better responsiveness */
}

/* Card header */


/* Form input field styling */
.form-control {
    border-radius: 30px; /* Fully rounded input fields */
    padding: 14px 20px; /* Padding inside input fields */
    font-size: 1rem; /* Larger font for easy reading */
    background-color: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    margin-bottom: 15px; /* Spacing between inputs */
    transition: box-shadow 0.3s ease, border-color 0.3s ease; /* Smooth transition */
}

/* Input focus effect */
.form-control:focus {
    box-shadow: 0 0 10px rgba(40, 167, 69, 0.5); /* Green glow on focus */
    border-color: #28a745; /* Success color border on focus */
}

/* Invalid input field style */
.is-invalid {
    border-color: #dc3545 !important;
    box-shadow: 0 0 5px rgba(220, 53, 69, 0.5);
}

/* Submit button styling */
.btn-success {
    background-color: #28a745;
    border: none;
    border-radius: 30px; /* Rounded button */
    padding: 14px 20px;
    font-size: 1.1rem; /* Slightly larger text for readability */
    color: white;
    width: 100%; /* Full width button */
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Button shadow */
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition */
}

/* Submit button hover effect */
.btn-success:hover {
    background-color: #218838;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15); /* Stronger shadow on hover */
}

/* Forgot password link styling */
.btn-link {
    color: #28a745;
    font-size: 0.9rem;
    text-decoration: none;
    padding: 0;
}

.btn-link:hover {
    text-decoration: underline;
}

/* Checkbox styling */
.form-check-input {
    border-radius: 5px; /* Rounded checkbox */
}

/* Centering and responsive design */
@media (max-width: 768px) {
    .card-body {
        padding: 20px;
    }
    .col-md-8 {
        width: 100%;
    }
    .col-md-4 {
        text-align: center;
        margin-bottom: 10px;
    }
}
</style>