<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    @include('partials.header')
    </nav>

    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-bold mb-6">Admin Dashboard</h2>
        <div>
            @include('partials.user-table', ['users' => $users])
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>

    @include('partials.footer')

</body>

</html>