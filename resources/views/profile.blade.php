<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>Email: {{ Auth::user()->email }}</p>
    <!-- Add more profile information here -->
</body>
</html>
