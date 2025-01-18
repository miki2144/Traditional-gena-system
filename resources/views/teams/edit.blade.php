<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Team</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 30px;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .form-control {
            border-radius: 30px; /* Full rounded corners for inputs */
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
            border-color: #007bff;
        }

        .btn {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 30px; /* Full rounded corners for buttons */
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #007bff;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .btn-link:hover {
            text-decoration: underline;
        }

        /* Mobile-specific styles */
        @media (max-width: 576px) {
            .container {
                margin: 20px auto;
                padding: 15px;
            }

            h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            .form-group label {
                font-size: 0.9rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Team</h1>

        <form action="{{ route('teams.update', $team->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name">Team Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $team->name) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $team->city) }}">
            </div>

            <div class="form-group mb-3">
                <label for="coach_id">Coach</label>
                <select class="form-control" id="coach_id" name="coach_id">
                    <option value="">Select Coach</option>
                    @foreach($coaches as $coach)
                        <option value="{{ $coach->id }}" {{ old('coach_id', $team->coach_id) == $coach->id ? 'selected' : '' }}>
                            {{ $coach->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="founded_year">Founded Year</label>
                <input type="text" class="form-control" id="founded_year" name="founded_year" value="{{ old('founded_year', $team->founded_year) }}">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Update Team</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
