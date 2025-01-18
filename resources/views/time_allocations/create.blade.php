<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Time Allocation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-control {
            border-radius: 30px;
            padding: 10px;
        }
        .btn {
            border-radius: 30px;
            padding: 10px 20px;
        }
        @media (max-width: 576px) {
            .container {
                padding: 20px;
                margin: 10px;
            }
            h1 {
                font-size: 1.5rem;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Time Allocation</h1>

        <form action="{{ route('time_allocations.store') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="game_id" class="form-label">Game</label>
                <select name="game_id" id="game_id" class="form-control" required>
                    <option value="">Select Game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}">{{ $game->homeTeam->name }} vs {{ $game->awayTeam->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="start_time" class="form-label">Start Time</label>
                <input type="time" name="start_time" id="start_time" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="end_time" class="form-label">End Time</label>
                <input type="time" name="end_time" id="end_time" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="allocated_minutes" class="form-label">Allocated Minutes</label>
                <input type="number" name="allocated_minutes" id="allocated_minutes" class="form-control" min="0">
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" name="description" id="description" class="form-control">
            </div>

            <div class="form-group mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <!-- <option value="pending">Pending</option> -->
                    <option value="approved">Approved</option>
                    <!-- <option value="rejected">Rejected</option> -->
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-50">Add Time Allocation</button>
        </form>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
