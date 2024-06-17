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
        }

        header {
            background-color: #5AB2FF; 
            color: white; 
            padding: 20px; 
            text-align: center;
        }

        .task-container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .task-label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .task-detail {
            margin-bottom: 20px;
        }

        .go-back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #5AB2FF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .go-back-link:hover {
            background-color: #4584d4;
        }

        .btn {
            margin: 5px;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #5AB2FF;
            color: white;
        }

        .btn-success:hover {
            background-color: #4584d4;
        }

        .btn-info {
            background-color: #A9A9A9;
            color: white;
        }

        .btn-info:hover {
            background-color: #8a8a8a;
        }

        .btn-complete {
            background-color: #28a745;
            color: white;
            display: flex;
            align-items: center;
            cursor: pointer;
        }

        .btn-complete:hover {
            background-color: #218838;
        }

        .btn-complete i {
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <header>
        <h1>To Do List</h1>
    </header>  
    <br>
    <a href="{{url()->previous()}}" class="go-back-link">Go Back</a>

    <div class="task-container">
        <div class="task-detail">
            <span class="task-label">Task:</span>
            <p>{{ $todo->title }}</p>
        </div>
        <div class="task-detail">
            <span class="task-label">What to do on your Task:</span>
            <p>{{ $todo->description }}</p>
        </div>
        <div class="btn-container">
            @if (!$todo->completed)
                <form method="POST" action="{{ route('tasks.complete', $todo->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-complete">
                        Mark as Completed <i class="fas fa-check"></i>
                    </button>
                </form>
            @else
                <button class="btn btn-success" disabled>Completed</button>
            @endif
            <a class="btn btn-info" href="{{ route('tasks.edit', $todo->id) }}">Edit</a>
        </div>
    </div>
</body>
</html>
