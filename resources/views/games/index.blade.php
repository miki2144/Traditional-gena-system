<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
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
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
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

        .alert {
            font-size: 1rem;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }

        table th, table td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .btn {
            border-radius: 30px; /* Full rounded corners for buttons */
            padding: 8px 16px;
        }

        /* Mobile-specific styles */
        @media (max-width: 576px) {
            .container {
                padding: 15px;
                margin: 20px;
            }

            h1 {
                font-size: 1.6rem;
            }

            table th, table td {
                font-size: 0.9rem;
                padding: 10px;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Games</h1>
        <a href="{{ route('games.create') }}" class="btn btn-primary mb-3">Create New Game</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Home Team</th>
                    <th>Away Team</th>
                    <th>Match Time</th>
                    <th>Location</th>
                    <th>Score Home</th>
                    <th>Score Away</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($games as $game)
                    <tr>
                        <td>{{ $game->homeTeam->name }}</td>
                        <td>{{ $game->awayTeam->name }}</td>
                        <td>{{ $game->game_time }}</td>
                        <td>{{ $game->location }}</td>
                        <td>{{ $game->score_home }}</td>
                        <td>{{ $game->score_away }}</td>
                        <td>
                            <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                            <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
