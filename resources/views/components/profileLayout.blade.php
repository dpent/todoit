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
    {{$slot}}
    <h3>First name: {{Auth::user()->first_name}}</h3>
    <h3>Last name: {{Auth::user()->last_name}}</h3>
    <h3>Username: {{Auth::user()->username}}</h3>
    <h3>Email address: {{Auth::user()->email}}</h3>
</div>
</body>
</html>
