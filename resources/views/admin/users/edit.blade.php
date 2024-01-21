<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Use a gradient background for the body */
        body {
            background: linear-gradient(to right, #f0f2f0, #96deda);
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Edit User</h2>

        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" class="max-w-lg mx-auto bg-white p-6 rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-gray-700 font-bold mb-2">Role:</label>
                <input disabled type="text" name="role" id="role" value="{{ $user->roles }}" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update User</button>
                <a href="{{ route('admin.dashboard') }}" class="text-gray-600 ml-4">Cancel</a>
            </div>
        </form>
    </div>

</body>
</html>
