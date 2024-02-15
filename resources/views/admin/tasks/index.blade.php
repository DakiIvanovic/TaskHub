<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks You Assigned</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/task.css') }}">

    <style>
        

        
    </style>
</head>

<body>

    <header>
        <h1>Kodistra Tasks</h1>
    </header>

    <nav>
        <a href="{{ route('admin.dashboard') }}">Task Management</a>
        <a href="{{ route('admin.tasks.create') }}" class="btn">Assign Task</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
            @csrf
            <button type="submit" class="btn">Logout</button>
        </form>
    </nav>

    <div class="container">

        <h2>Task List</h2>

        <div>
            @foreach ($tasks as $task)
                <div class="task-card">
                    <h5>Title: {{ $task->title }}</h5>
                    <p>Description: {{ $task->description }}</p>
                    <p>Assigned to: {{ $task->user->name }}</p>
                    <p>Added at: {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
                </div>
            @endforeach
        </div>

        <div>
            <a href="{{ route('admin.dashboard') }}" class="btn">Return to admin dashboard</a>
        </div>

    </div>

    @include('partials.footer')

</body>

</html>
