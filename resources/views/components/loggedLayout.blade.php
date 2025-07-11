<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome - To-Do List App</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #c2e9fb 0%, #a1c4fd 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 420px;
            width: 100%;
        }

        h1 {
            font-size: 26px;
            color: #333;
            margin-bottom: 30px;
        }

        a.button {
            display: inline-block;
            padding: 14px 24px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            margin: 10px;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        a.button:hover {
            background-color: #43a047;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Welcome, {{ Auth::user()->first_name }}!</h1>

    <a href="/todoList" class="button">View My To-Do List</a>
    <a href="/profile" class="button">View Profile</a>

    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
        @csrf
        <button type="submit" class="button">
            Log out
        </button>
    </form>
</div>
</body>
</html>
