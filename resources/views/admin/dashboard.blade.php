<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

<nav class="bg-white p-4 shadow-lg">
    
    <div class="flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold">Task Management</a>
        <a href="{{ route('admin.tasks.index') }}" class="text-gray-800 hover:text-blue-600 transition duration-300">Assign Task</a>
        <form method="POST" action="{{ route('logout') }}" class="">
            @csrf
            <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
        </form>
    </div> 
</nav>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>

        <table class="min-w-full bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b text-center">Name</th>
                    <th class="py-2 px-4 border-b text-center">Email</th>
                    <th class="py-2 px-4 border-b text-center">Role</th>
                    <th class="py-2 px-4 border-b text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="py-2 px-4 border-b text-center">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b text-center">{{ $user->roles }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            {{-- Edit User --}}
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 mx-1 rounded">Edit</a>

                            {{-- Delete User --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 mx-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
