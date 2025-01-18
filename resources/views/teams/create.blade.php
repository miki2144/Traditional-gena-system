<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Team</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s ease;
            border-radius: 50px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        @media (max-width: 576px) {
            .form-container {
                padding: 15px;
                margin: 20px;
            }

            .form-container h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>

    <div class="form-container">
        <h1>Create a New Team</h1>

        <form action="{{ route('teams.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Team Name</label>
                <input  type="text" class="form-control rounded-pill"  id="name"  name="name"  value="{{ old('name') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="city">City</label>
                <input  type="text" class="form-control rounded-pill"  id="city" name="city" 
                    value="{{ old('city') }}">
            </div>

            <div class="form-group mb-3">
                <label for="coach_id">Coach</label>
                <select 
                    class="form-control rounded-pill" 
                    id="coach_id" 
                    name="coach_id">
                    <option value="">Select Coach</option>
                    @foreach($coaches as $coach)
                        <option 
                            value="{{ $coach->id }}" 
                            {{ old('coach_id') == $coach->id ? 'selected' : '' }}>
                            {{ $coach->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="founded_year">Founded Year</label>
                <input  type="text" class="form-control rounded-pill" id="founded_year" 
                    name="founded_year" 
                    value="{{ old('founded_year') }}">
            </div>

            <button type="submit" class="btn btn-primary w-100">Create Team</button>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
