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

        .login {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login h2 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .login form {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }

        .login form input {
            margin-bottom: 10px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .login form button {
            background-color: #0072ff;
            border: none;
            color: white;
            padding: 10px;
            font-size: 16px;
            border-radius: 10px;
            cursor: pointer;
        }
        
        .login form a {
            text-align: center;
            margin-top: 10px;
            color: #0072ff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login">
            <h2>DailyDoer</h2>
            <p>Welcome!</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <input type="email" name="email" placeholder="Email Address" required>
                
                <!-- Password -->
                <input type="password" name="password" placeholder="Password" required>
                
                <!-- Remember Me -->
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ms-2 text-sm text-gray-600">Remember me</span>
                </label>

                <!-- Submit Button -->
                <button type="submit">Login</button>

                <!-- Forgot Password Link -->
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forgot Password</a>
                @endif
            </form>
        </div>
    </div>
</body>
</html>
