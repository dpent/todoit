<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - To-Do List App</title>
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
            padding: 40px 35px;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        .icon {
            font-size: 48px;
            color: #4CAF50;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 25px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="number"] {
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            padding: 14px;
            background-color: #4CAF50;
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: #43a047;
            transform: translateY(-2px);
        }

        .footer-link {
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }

        .footer-link a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">

    {{$slot}}
    <div class="icon">🔐</div>
    <form action="/createTodo" method="POST">
        @csrf

        @if ($errors->any())
            <div style="color: red; margin-bottom: 15px;">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <input type="text" name="title" placeholder="TODO" value="{{ old('title') }}" required>
        <input type="number" name="priority" placeholder="priority (1-5)" value="{{old('priority')}}" required>
        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
