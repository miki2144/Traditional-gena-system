<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coaches</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .table {
            border-radius: 8px; /* Rounded corners for the table */
            overflow: hidden; /* Prevent overflow for rounded corners */
        }

        .btn {
            padding: 10px 15px; /* Adjust padding for buttons for a better touch area */
            border-radius: 5px; /* Rounded corners for buttons */
        }

        .btn-success {
            background-color: #28a745; /* Custom success color */
            border: none; /* No border */
        }

        .btn-warning {
            background-color: #ffc107; /* Custom warning color */
            border: none; /* No border */
        }

        .btn-danger {
            background-color: #dc3545; /* Custom danger color */
            border: none; /* No border */
        }

        .btn:hover {
            opacity: 0.9; /* Slight opacity on hover */
        }

        @media (max-width: 768px) {
            .table {
                font-size: 0.9rem; /* Smaller font size for mobile */
            }

            .btn {
                width: 100%; /* Full-width buttons on mobile */
                margin-bottom: 10px; /* Spacing between buttons */
            }

            h1 {
                font-size: 1.5rem; /* Adjust heading size for mobile */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Coaches</h1>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="text-center mb-3">
            <a href="{{ route('coaches.create') }}" class="btn btn-success my-3 rounded-pill">Add Coach</a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Age</th>
                        <th>Specialization</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coaches as $coach)
                        <tr>
                            <td>
                                @if($coach->image)
                                    <img src="{{ asset('storage/' . $coach->image) }}" alt="{{ $coach->name }}'s Avatar" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                                @else
                                    <img src="{{ asset('path/to/default/avatar.png') }}" alt="Default Avatar" style="max-width: 50px; max-height: 50px; border-radius: 50%;">
                                @endif
                            </td>
                            <td>{{ $coach->name }}</td>
                            <td>{{ $coach->email }}</td>
                            <td>{{ $coach->age }}</td>
                            <td>{{ $coach->specialization }}</td>
                            <td>{{ $coach->phone }}</td>
                            <td>
                                <a href="{{ route('coaches.edit', $coach->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('coaches.destroy', $coach->id) }}" method="POST" style="display:inline;">
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
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>