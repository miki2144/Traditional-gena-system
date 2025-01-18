<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coach</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Light background color for a clean look */
        }
        
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Center align items */
            min-height: 100vh; /* Full height to center vertically */
        }

        .card {
            background-color: white; /* White background for the card */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            border-radius: 15px; /* Rounded corners for the card */
            width: 100%; /* Full width */
            max-width: 500px; /* Max width */
            border: none; /* No border */
        }

        .card-header {
            background-color: #007bff; /* Header background color */
            color: white; /* Header text color */
            border-top-left-radius: 15px; /* Rounded corners for the header */
            border-top-right-radius: 15px; /* Rounded corners for the header */
        }

        .form-control {
            padding: 12px; /* Increased padding for input fields */
            border-radius: 50px; /* Rounded pill shape for input fields */
            border: 1px solid #ccc; /* Border for input fields */
            margin-bottom: 15px; /* Margin for spacing */
            width: 100%; /* Full width for inputs */
        }

        .form-label {
            font-weight: bold; /* Bold labels for better readability */
            text-align: center; /* Center align labels */
            width: 100%; /* Full width for labels */
        }

        .btn {
            padding: 12px; /* Increased padding for the button */
            border-radius: 50px; /* Rounded pill shape for the button */
            background-color: rgb(23, 228, 51); /* Button background color */
            border: none; /* Remove border for button */
        }

        .btn:hover {
            background-color: #004494; /* Darker shade on hover */
        }

        .alert {
            margin-bottom: 20px; /* Space below success alert */
        }

        /* Responsive styles */
        @media (max-width: 576px) {
            .card {
                width: 90%; /* Full width on smaller screens */
            }

            .form-control {
                font-size: 1rem; /* Adjust font size for smaller screens */
            }

            .btn {
                font-size: 1rem; /* Adjust button font size */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h1>Create Coach</h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <div class="card-body">
                <form action="{{ route('coaches.store') }}" method="POST" enctype="multipart/form-data" class="d-flex flex-column align-items-center">
                    @csrf
                    <div class="mb-4 w-100">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="mb-4 w-100">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-4 w-100">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" required>
                    </div>
                    <div class="mb-4 w-100">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" min="0">
                    </div>
                    <div class="mb-4 w-100">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" class="form-control" name="specialization">
                    </div>
                    <div class="mb-4 w-100">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" maxlength="15">
                    </div>
                    <div class="mb-4 w-100">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 my-3">Create Coach</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>