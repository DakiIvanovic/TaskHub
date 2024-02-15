<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/edit-user.css') }}" rel="stylesheet">
</head>

<body>

    @include('partials.edit-user-header')

    @include('partials.edit-user-form', ['user' => $user])

</body>

</html>