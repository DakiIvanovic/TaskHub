<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks You Assigned</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/task.css') }}">
</head>

<body>

    <nav class="bg-gray-800 p-4 flex items-center justify-between text-white"">
        <a href="{{ route('admin.dashboard') }}">Task Management</a>
        <a href="{{ route('admin.tasks.create') }}" class="btn">Assign Task</a>
        <form method="POST" action="{{ route('logout') }}" style="display: inline-block;">
            @csrf
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 ease-in-out">Logout</button>
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