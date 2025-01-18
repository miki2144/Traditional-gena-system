<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Game</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control, .form-select {
            border-radius: 25px; /* Rounded corners for form controls */
            padding: 10px; /* Minimized padding for inputs */
        }
        .btn {
            border-radius: 25px; /* Rounded corners for buttons */
            padding: 12px 20px;
            width: 100%; /* Full width for button */
            font-size: 1.1rem;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .mb-3 {
            margin-bottom: 15px;
        }
        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }
            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Game</h1>

        <form action="{{ route('games.update', $game->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="home_team_id" class="form-label">Home Team</label>
                <select name="home_team_id" class="form-select" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ $game->home_team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="away_team_id" class="form-label">Away Team</label>
                <select name="away_team_id" class="form-select" required>
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}" {{ $game->away_team_id == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="game_time" class="form-label">Match Time</label>
                <input type="datetime-local" name="game_time" value="{{ $game->game_time }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" name="location" value="{{ $game->location }}" maxlength="255" class="form-control">
            </div>

            <div class="mb-3">
                <label for="score_home" class="form-label">Score Home</label>
                <input type="number" name="score_home" value="{{ $game->score_home }}" min="0" class="form-control">
            </div>

            <div class="mb-3">
                <label for="score_away" class="form-label">Score Away</label>
                <input type="number" name="score_away" value="{{ $game->score_away }}" min="0" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Update Game</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
