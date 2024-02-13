<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- External CSS file for custom styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    @include('partials.header')

    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-6">Admin Dashboard</h2>
        <div class="overflow-x-auto">
            @include('partials.user-table', ['users' => $users])
        </div>
    </div>

    <!-- External JavaScript file for custom scripts -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>

</html>
