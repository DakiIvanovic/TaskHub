<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/create-task.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-200">

    @include('partials.task-create-header')

    <div class="container">

        <h2>Assign Task</h2>

        @include('partials.task-form')
    </div>

    <!-- External JavaScript file for custom scripts -->
    <script src="{{ asset('js/task.js') }}"></script>

    @include('partials.footer')

</body>

</html>