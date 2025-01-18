<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gena Management System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        /* Navbar Styles */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            text-decoration: none;
        }

        .brand:hover {
            color: red; /* Change color to red on hover */
        }

        .nav-links {
            display: flex;
            align-items: center;
            justify-content: center; /* Center the nav links */
            gap: 20px; /* Increased gap for better spacing */
            flex-grow: 1; /* Allow nav links to grow */
        }

        .nav-links .search-bar input {
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 20px;
            outline: none;
            transition: border-color 0.3s;
        }

        .nav-links .search-bar input:focus {
            border-color: #555;
        }

        .notifications,
        .profile {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #f4f4f4;
            color: black;
            font-size: 1.2rem;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
        }

        .notifications:hover,
        .profile:hover {
            transform: scale(1.1);
            background-color: #e0e0e0;
        }

        /* Hamburger Menu */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            margin: 0 auto; /* Center the hamburger */
        }

        .hamburger div {
            width: 25px;
            height: 3px;
            background-color: black;
            margin: 4px 0; /* Spacing between bars */
            transition: 0.4s;
        }

        /* Profile Dropdown */
        .profile-dropdown {
            display: none;
            position: absolute;
            right: 20px;
            top: 60px;
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            padding: 10px;
            z-index: 1000;
            width: 200px;
        }

        .profile-dropdown p {
            margin: 0;
            padding: 5px 0;
        }

        .profile-dropdown hr {
            margin: 10px 0;
        }

        .profile-dropdown a,
        .profile-dropdown button {
            text-decoration: none;
            color: black;
            display: block;
            width: 100%;
            text-align: left;
            padding: 5px 0;
            background: none;
            border: none;
            cursor: pointer;
        }

        .profile-dropdown button {
            color: red;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 200px;
            background-color: #333;
            color: white;
            height: calc(100vh - 60px);
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            padding-left: 15px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #555;
        }

        .container {
            margin-left: 220px;
            margin-top: 80px;
            padding: 20px;
        }

        /* Mobile Responsive Styles */
        @media (max-width: 768px) {
            .nav-links {
                display: none; /* Hide nav links on mobile */
                flex-direction: column;
                width: 100%;
                background-color: white;
                position: absolute;
                top: 60px;
                left: 0;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }

            .nav-links.active {
                display: flex; /* Show nav links when active */
            }

            .hamburger {
                display: flex; /* Show hamburger icon on mobile */
            }

            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                margin-left: 0;
                padding: 10px;
            }

            .container {
                margin-left: 0;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav>
    <a href="#" class="brand">ገና System</a>
    <div class="nav-links" id="nav-links">
        <div class="search-bar">
            <input type="text" placeholder="Search...">
        </div>
        <div class="notifications" title="Notifications">
            <i class="fa-solid fa-bell"></i>
        </div>
        <div class="profile" onclick="toggleDropdown()" title="Profile">
            <i class="fa-solid fa-user"></i>
        </div>
    </div>
    <div class="hamburger" onclick="toggleMenu()">
        <div></div>
        <div></div>
        <div></div>
    </div>
    <!-- Profile Dropdown -->
    <div id="dropdown" class="profile-dropdown">
        <p><strong>{{ Auth::user()->name }}</strong></p>
        <p>{{ Auth::user()->email }}</p>
        <hr>
        <a href="{{ route('profile') }}">View Profile</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="{{ route('coaches.index') }}">Coaches</a>
    <a href="{{ route('players.index') }}">Players</a>
    <a href="{{ route('teams.index') }}">Teams</a>
    <a href="{{ route('games.index') }}">Games</a>
    <a href="{{ route('time_allocations.index') }}">Time Allocations</a>
</div>

<!-- Main Content -->
<div class="container">
    @yield('content')
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdown');
        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    // Close dropdown if clicked outside
    document.addEventListener('click', (event) => {
        const dropdown = document.getElementById('dropdown');
        if (!event.target.closest('.profile')) {
            dropdown.style.display = 'none';
        }
    });

    function toggleMenu() {
        const navLinks = document.getElementById('nav-links');
        navLinks.classList.toggle('active');
    }
</script>
</body>
</html>