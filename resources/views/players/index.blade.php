<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Players</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0; /* Light background color */
        }

        .container {
            margin-top: 50px; /* Top margin for spacing */
            display: flex;
            flex-direction: column;
            align-items: center; /* Center align items */
        }

        h1 {
            margin-bottom: 30px; /* Space below heading */
        }

        .table {
            background-color: white; /* White background for the table */
            border-radius: 15px; /* Rounded corners for the table */
            overflow: hidden; /* Clip overflow for rounded corners */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow effect */
        }

        .btn {
            border-radius: 50px; /* Rounded button shape */
            padding: 8px 12px; /* Adjust padding for buttons */
        }

        .alert {
            margin-bottom: 20px; /* Space below success alert */
        }

        img {
            border-radius: 50%; /* Round avatar images */
        }

        @media (max-width: 576px) {
            .btn {
                padding: 5px 10px; /* Smaller padding for mobile */
                font-size: 0.8rem; /* Smaller font size for buttons */
            }

            .table {
                font-size: 0.9rem; /* Smaller font size for the table */
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Players</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('players.create') }}" class="btn btn-primary mb-3">Add Player</a>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Team</th>
                        <th>Age</th>
                        <th>Height (cm)</th>
                        <th>Weight (kg)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                        <tr>
                            <td>
                                @if($player->image)
                                    <img src="{{ asset('storage/' . $player->image) }}" alt="{{ $player->name }}'s Avatar" style="max-width: 50px; max-height: 50px;">
                                @else
                                    <img src="{{ asset('path/to/default/avatar.png') }}" alt="Default Avatar" style="max-width: 50px; max-height: 50px;">
                                @endif
                            </td>
                            <td>{{ $player->name }}</td>
                            <td>{{ $player->position }}</td>
                            <td>{{ $player->team->name }}</td>
                            <td>{{ $player->age }}</td>
                            <td>{{ $player->height }}</td>
                            <td>{{ $player->weight }}</td>
                            <td>
                                <a href="{{ route('players.edit', $player->id) }}" class="btn btn-warning mx-1">Edit</a>
                                <form action="{{ route('players.destroy', $player->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger mx-1">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>