<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Player</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Light background color */
        }
        
        .container {
            margin-top: 50px; /* Top margin for spacing */
        }

        .card {
            border-radius: 15px; /* Rounded corners for the card */
        }

        .btn {
            padding: 10px 15px; /* Adjust padding for buttons */
            border-radius: 5px; /* Rounded corners for buttons */
        }

        .alert {
            margin-bottom: 20px; /* Space below success alert */
        }

        @media (max-width: 768px) {
            .form-control, .form-select {
                font-size: 0.9rem; /* Smaller font size for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Create Player</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <form action="{{ route('players.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control rounded-pill" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Position</label>
                        <input type="text" class="form-control rounded-pill" name="position" required>
                    </div>
                    <div class="mb-3">
                        <label for="team_id" class="form-label">Team</label>
                        <select class="form-select rounded-pill" name="team_id" required>
                            <option value="">Select Team</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="number" class="form-control rounded-pill" name="age" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="height" class="form-label">Height (in cm)</label>
                        <input type="number" class="form-control rounded-pill" name="height" step="0.01" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="weight" class="form-label">Weight (in kg)</label>
                        <input type="number" class="form-control rounded-pill" name="weight" step="0.01" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control rounded-pill" name="image" accept="image/*">
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill w-50">Create Player</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>