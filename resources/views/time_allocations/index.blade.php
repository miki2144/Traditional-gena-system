<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Allocations</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Time Allocations</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="{{ route('time_allocations.create') }}" class="btn btn-success rounded-pill mb-3">Add Time Allocation</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Game</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Allocated Minutes</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($timeAllocations as $timeAllocation)
                    <tr>
                        <!-- Displays the name of the allocated game -->
                        <td>
                            @if($timeAllocation->game && $timeAllocation->game->homeTeam && $timeAllocation->game->awayTeam)
                                {{ $timeAllocation->game->homeTeam->name }} vs {{ $timeAllocation->game->awayTeam->name }}
                            @else
                                No Game Available
                            @endif
                        </td>
                        <td>{{ $timeAllocation->start_time }}</td>
                        <td>{{ $timeAllocation->end_time }}</td>
                        <td>{{ $timeAllocation->allocated_minutes }}</td>
                        <td>{{ $timeAllocation->description }}</td>
                        <td>{{ $timeAllocation->status }}</td>
                        <td>
                            <a href="{{ route('time_allocations.edit', $timeAllocation->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('time_allocations.destroy', $timeAllocation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
