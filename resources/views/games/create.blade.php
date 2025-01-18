<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Game</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        /* Center the container and apply padding and shadow */
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-group {
            margin-bottom: 10px; /* Reduced margin between form groups */
        }

        .form-control {
            border-radius: 30px; /* Rounded corners for input fields */
            padding: 6px 10px; /* Minimized padding for form inputs */
        }

        .btn {
            border-radius: 30px; /* Full rounded corners for buttons */
            padding: 8px 16px; /* Minimized padding for buttons */
        }

        /* Mobile-specific styles */
        @media (max-width: 576px) {
            .container {
                padding: 20px;
                margin: 20px;
            }

            h1 {
                font-size: 1.6rem;
            }

            .btn {
                width: 100%;
            }

            .form-control {
                font-size: 0.9rem;
                padding: 5px 8px; /* Reduced padding on mobile */
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Create Game</h1>

        <form action="{{ route('games.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="home_team_id">Home Team</label>
                <select name="home_team_id" class="form-control" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="away_team_id">Away Team</label>
                <select name="away_team_id" class="form-control" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="game_time">Match Time</label>
                <input type="datetime-local" name="game_time" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" maxlength="255">
            </div>

            <div class="form-group">
                <label for="score_home">Score Home</label>
                <input type="number" name="score_home" value="0" min="0" class="form-control">
            </div>

            <div class="form-group">
                <label for="score_away">Score Away</label>
                <input type="number" name="score_away" value="0" min="0" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary mt-3">Create Game</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
