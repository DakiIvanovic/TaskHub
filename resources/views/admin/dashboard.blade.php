<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    <nav class="bg-transparent p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>

            <form method="GET" action="{{ url('/admin/dashboard') }}" class="flex items-center">
                <input type="text" name="query" value="{{ isset($query) ? $query : '' }}"
                    placeholder="Search by name or email" class="px-4 py-2 border rounded-l">
                <button type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded-r transition duration-300 hover:scale-105">Search</button>
            </form>

            <div class="flex items-center space-x-4 ml-auto">
                <a href="{{ route('admin.tasks.index') }}" class="text-gray-800 hover:text-blue-600 transition duration-300">Assign Task</a>
    
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h2 class="text-3xl font-semibold mb-6">Admin Dashboard</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border rounded-md overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Role</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-200' }}">
                            <td class="py-3 px-6 text-center">{{ $user->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->roles }}</td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:scale-105 btn">Edit</a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded transition duration-300 hover:scale-105 btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
