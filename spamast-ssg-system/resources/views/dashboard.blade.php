<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard | SPAMAST SSG</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 0;
            padding: 30px;
            color: #1f2937;
        }
        .container {
            max-width: 1200px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #0000000d;
        }
        h1 { margin: 0 0 5px 0; color: #173b2d; }
        p { margin: 0; color: #6b7280; }
        .logout {
            background: #6b7280;
            color: white;
            padding: 11px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
        }
        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 25px;
        }
        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px #0000000d;
            text-decoration: none;
            color: inherit;
            display: block;
        }
        .card:hover { box-shadow: 0 4px 16px #00000020; }
        .card h2 { margin: 0 0 8px 0; color: #176b4d; font-size: 20px; }
        .stat { font-size: 36px; font-weight: bold; color: #173b2d; }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <div>
            <h1>Welcome, {{ $user->name }}</h1>
            <p>SPAMAST SSG Event Management System</p>
        </div>
        <form method="POST" action="{{ route('logout') }}" style="margin:0;">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </div>

    <div class="cards">
        <div class="card">
            <h2>Registered Students</h2>
            <div class="stat">{{ $totalStudents }}</div>
        </div>
        <a class="card" href="{{ route('sanctions.index') }}">
            <h2>Sanctions</h2>
            <p>Manage student sanctions</p>
        </a>
        <a class="card" href="{{ route('events.index') }}">
            <h2>Events</h2>
            <p>Manage events</p>
        </a>
        <a class="card" href="{{ route('attendance.index') }}">
            <h2>Attendance</h2>
            <p>Track event attendance</p>
        </a>
        <a class="card" href="{{ route('profile.edit') }}">
            <h2>Edit Profile</h2>
            <p>Update your account details</p>
        </a>
    </div>
</div>
</body>
</html>
