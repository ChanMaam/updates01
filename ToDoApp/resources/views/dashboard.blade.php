<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To Do List</title>

    <!-- Include the Indie Flower font from Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap">

    <style>
        body {
            background-color: #FFF9D0;
            font-family: 'Indie Flower', cursive;
            margin: 0;
            padding: 0;
            display: flex;
        }

        .sidebar {
            background-color: #0575E6;
            width: 191px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            box-sizing: border-box;
        }

        .sidebar .title {
            color: white;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .content {
            margin-left: 200px;
            width: calc(100% - 200px);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #0575E6;
            color: white;
            padding: 5px;
            text-align: center;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        header h1 {
            margin: 0;
            cursor: pointer;
        }

        .user-menu {
            margin-top: 10px;
            cursor: pointer;
            position: absolute;
            right: 20px;
            top: 20px;
        }

        .user-menu button {
            background-color: transparent;
            border: none;
            color: white;
            font-size: 16px;
            font-family: 'Indie Flower', cursive;
            cursor: pointer;
        }

        .dropdown {
            display: none;
            position: absolute;
            top: 30px;
            right: 0;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            z-index: 1;
        }

        .dropdown a, .dropdown form button {
            display: block;
            padding: 10px 20px;
            text-align: left;
            text-decoration: none;
            color: #5AB2FF;
            border: none;
            background-color: white;
            width: 100%;
            box-sizing: border-box;
        }

        .dropdown a:hover, .dropdown form button:hover {
            background-color: #f0f0f0;
        }

        .container {
            max-width: 800px;
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .create-button {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .create-button input {
            width: 45%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .create-button button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #5AB2FF;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .create-button button:hover {
            background-color: #4584d4;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
    </style>

    <script>
        function toggleDropdown() {
            var dropdown = document.getElementById('dropdown');
            if (dropdown.style.display === 'none' || dropdown.style.display === '') {
                dropdown.style.display = 'block';
            } else {
                dropdown.style.display = 'none';
            }
        }

        window.onclick = function(event) {
            if (!event.target.matches('.user-menu button')) {
                var dropdown = document.getElementById('dropdown');
                if (dropdown.style.display === 'block') {
                    dropdown.style.display = 'none';
                }
            }
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <div class="title">Projects</div>
    </div>
    <div class="content">
        <header>
            <h1 onclick="window.location='{{ route('tasks.index') }}';">To Do List</h1>
        </header>

        @auth
        <div class="user-menu">
            <button onclick="toggleDropdown()">Hello, {{ Auth::user()->name }}</button>
            <div class="dropdown" id="dropdown">
                <a href="{{ route('profile.edit') }}">Profile</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
        @endauth

        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="post" action="{{ route('tasks.store') }}">
                @csrf
                <div class="create-button">
                    <input type="text" id="titleInput" name="title" placeholder="Title">
                    <input type="text" id="descriptionInput" name="description" placeholder="Description">
                    <button type="submit">Create</button>
                </div>
            </form>

                <div id="chatbox">
            <form method="post" action="{{ route('send-message') }}">
                @csrf
                    <input type="text" name="message" placeholder="Type your message here">
                    <button type="submit">Send</button>
            </form>
                </div>

            <!-- Notes Container -->
            <div class="notes-container">
                <!-- Dynamically generated notes will be inserted here -->
            </div>
        </div>
    </div>
</body>
</html>
