<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/edit-user.css') }}" rel="stylesheet">
    <script src="{{ asset('js/edit-user.js') }}"></script>

</head>

<body>

    <div class="container">
        <h2 class="text-2xl font-semibold mb-4">Edit User</h2>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="border rounded p-2">
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="border rounded p-2">
            </div>

            <div>
                <label for="role">Role:</label>
                <input disabled type="text" name="role" id="role" value="{{ $user->roles }}" class="border rounded p-2">
            </div>

            <div>
                <button id="submitButton" type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700" disabled>Update User</button>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-blue-500">Cancel</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/edit-user.js') }}"></script>

    @include('partials.footer')

</body>

</html>