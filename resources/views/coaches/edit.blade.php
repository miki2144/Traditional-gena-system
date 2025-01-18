<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coach</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Light background color */
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align items */
            margin-top: 50px; /* Top margin for spacing */
        }

        .card {
            background-color: white; /* White background for the card */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            border-radius: 15px; /* Rounded corners for the card */
            width: 100%; /* Full width */
            max-width: 500px; /* Max width */
        }

        .form-control {
            padding: 12px; /* Increased padding for input fields */
            border-radius: 8px; /* Rounded corners for input fields */
            border: 1px solid #ccc; /* Border for input fields */
        }

        .form-label {
            font-weight: bold; /* Bold labels for better readability */
        }

        .btn {
            padding: 12px; /* Increased padding for the button */
            border-radius: 8px; /* Rounded corners for the button */
            background-color: #0056b3; /* Button background color */
            border: none; /* Remove border for button */
        }

        .btn:hover {
            background-color: #004494; /* Darker shade on hover */
        }

        .alert {
            margin-bottom: 20px; /* Space below success alert */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Coach</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <form action="{{ route('coaches.update', $coach->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $coach->name }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $coach->email }}" required>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password (leave blank to keep current)</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-4">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control" name="age" value="{{ $coach->age }}" min="0">
                    </div>
                    <div class="mb-4">
                        <label for="specialization" class="form-label">Specialization</label>
                        <input type="text" class="form-control" name="specialization" value="{{ $coach->specialization }}">
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{ $coach->phone }}" maxlength="15">
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label">Image</label>
                        @if($coach->image)
                            <img src="{{ asset('storage/' . $coach->image) }}" alt="Coach Image" style="max-width: 150px; margin-bottom: 10px; border-radius: 8px;">
                        @endif
                        <input type="file" class="form-control" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-primary w-50 my-3 rounded-pill">Update Coach</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>