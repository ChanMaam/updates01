
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>DailyDoer</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
                border-radius: 5px;
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

            .input-group {
                position: relative;
                margin-bottom: 10px;
            }

            .input-group input {
                width: 100%;
                padding: 10px 40px 10px 10px;
                font-size: 16px;
                border: 1px solid #ccc;
                border-radius: 25px;
            }

            .input-group .icon {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                right: 20px;
                color: #aaa;
            }

            .right-panel form button {
                background-color: #0072ff;
                border: none;
                color: white;
                padding: 10px;
                font-size: 16px;
                border-radius: 25px;
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
                <p>The most popular peer to peer lending at SEA</p>
            </div>
            <div class="right-panel">
                <h2>Hello!</h2>
                <p>Sign Up to Get Started</p>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div class="input-group">
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Full Name"/>
                        <i class="fas fa-user icon"></i>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="input-group mt-4">
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="Email Address"/>
                        <i class="fas fa-envelope icon"></i>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="input-group mt-4">
                        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="Password"/>
                        <i class="fas fa-lock icon"></i>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="input-group mt-4">
                        <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
                        <i class="fas fa-lock icon"></i>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>

