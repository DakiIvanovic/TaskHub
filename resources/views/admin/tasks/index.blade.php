<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    <nav class="bg-transparent p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>
            <div class="ml-auto">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-10 p-4 max-w-3xl bg-white rounded-lg shadow-md">

        <h2 class="text-3xl font-semibold mb-4 text-center text-gray-800">Task List</h2>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach ($tasks as $task)
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition duration-300">
                    <div class="p-6">
                        <h5 class="text-lg font-semibold mb-2">Title: {{ $task->title }}</h5>
                        <p class="text-gray-700 mb-2">Description: {{ $task->description }}</p>
                        <p class="text-gray-700 mb-2">Assigned to: {{ $task->user->name }}</p>
                        <p class="text-gray-700">Added at: {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex justify-between mt-4">
            <a href="{{ route('admin.tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500 transition duration-300">Assign Task</a>
            <a href="{{ route('admin.dashboard') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500 transition duration-300">Return to admin dashboard</a>
        </div>

    </div>

</body>

</html>
