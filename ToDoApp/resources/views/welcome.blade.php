<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DailyDoer</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            height: 100vh;
        }

        .left-panel {
            background: linear-gradient(to bottom, #00c6ff, #0072ff);
            color: white;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
        }

        .left-panel h1 {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .left-panel p {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .left-panel button {
            background-color: #0056b3;
            border: none;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }

        .right-panel {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .right-panel h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .right-panel form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        .right-panel form input {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .right-panel form button {
            background-color: #0072ff;
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }
        
        .right-panel form a.register-link {
            background-color: #0072ff;
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
    
        }

        .right-panel form a {
            text-align: center;
            margin-top: 10px;
            color: #0072ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="left-panel">
            <h1>DailyDoer</h1>
            <p>The most popular to do list app in the PHILIPPINES DESUWA!</p>
        </div>
        <div class="right-panel">
            <h2>Hello There!</h2>
            <p>Welcome Back</p>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Login</button>
                <div style="margin-top: 20px;">
                    <a href="{{ route('register') }}" class="register-link">Register</a>
                </div>
                <a href="{{ route('password.request') }}">Forgot Password</a>
            </form>
        </div>
    </div>
</body>
</html>
