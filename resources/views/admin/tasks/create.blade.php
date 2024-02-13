<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Management</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- External CSS file for custom styles -->
    <link href="{{ asset('css/task.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    @include('partials.task-header')

    <div class="container mx-auto mt-10 p-4 max-w-md bg-white rounded-lg shadow-md">

        <h2 class="text-3xl font-semibold mb-4 text-center text-gray-800">Assign Task</h2>

        @include('partials.task-form', ['users' => $users])
    </div>

    <!-- External JavaScript file for custom scripts -->
    <script src="{{ asset('js/task.js') }}"></script>
</body>

</html>
