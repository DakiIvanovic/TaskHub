<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- External CSS file for custom styles -->
    <link href="{{ asset('css/edit-user.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    @include('partials.edit-user-form', ['user' => $user])

</body>

</html>