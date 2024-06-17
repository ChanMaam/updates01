<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Completed Tasks</title>
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
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .table th:first-child, .table td:first-child {
            border-left: none;
        }
        .table th:last-child, .table td:last-child {
            border-right: none;
        }
        .btn-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }
        .btn {
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
        .btn-danger {
            background-color: #FF6347;
            color: white;
        }
        .btn-info {
            background-color: #A9A9A9;
            color: white;
        }
        .btn-info:hover {
            background-color: #4584d4;
        }
        .create-task-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .completed-task {
            color: green;
            font-weight: bold;
        }
        .success-message, .alert {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .success-message {
            background-color: #d4edda;
            color: #155724;
        }
        .alert {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <header>
        <h1>Completed Tasks</h1>
    </header>
    <div class="container">
        <div class="create-task-link">
            <a class="btn btn-info" href="{{ route('tasks.index') }}">Back to Tasks</a>
        </div>
        @if (Session::has('alert-success'))
            <div class="success-message">
                {{ Session::get('alert-success') }}
            </div>
        @endif
        @if (Session::has('error'))
            <div class="alert">
                {{ Session::get('error') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($completedTodos as $completedTodo)
                    <tr>
                        <td class="completed-task">{{ $completedTodo->title }}</td>
                        <td class="completed-task">{{ $completedTodo->description }}</td>
                        <td>
                            <span class="check-icon">✔</span>
                        </td>
                        <td class="btn-container">
                            <a class="btn btn-success" href="{{ route('tasks.show', $completedTodo->id) }}">View</a>
                            <form method="post" action="{{ route('tasks.destroy') }}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="todo_id" value="{{ $completedTodo->id }}">
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($completedTodos->isEmpty())
            <h4>No Completed Tasks Yet</h4>
        @endif
    </div>
</body>
</html>
