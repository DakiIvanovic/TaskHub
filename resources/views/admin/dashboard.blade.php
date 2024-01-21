<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- Add some custom styles -->
    <style>
        /* Use a gradient background for the body */
        body {
            background: linear-gradient(to right, #f0f2f0, #96deda);
        }

        /* Add some hover effects for the buttons */
        .btn:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        /* Add some spacing and border-radius for the table */
        table {
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Use different colors for the table header and rows */
        thead {
            background-color: #f7fafc;
        }

        tbody tr:nth-child(odd) {
            background-color: #edf2f7;
        }

        tbody tr:nth-child(even) {
            background-color: #e2e8f0;
        }
    </style>
</head>
<body>

<nav class="bg-white p-4 shadow-lg">

    <div class="flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>
        <form method="GET" action="{{ url('/admin/dashboard') }}" class="flex items-center">
            <input type="text" name="query" value="{{ isset($query) ? $query : '' }}" placeholder="Search by name or email" class="px-2 py-1 border">
            <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>
        <!-- Add the ml-auto class to the div containing the buttons -->
        <div class="ml-auto">
            <a href="{{ route('admin.tasks.index') }}" class="text-gray-800 hover:text-blue-600 transition duration-300">Assign Task</a>
            <form method="POST" action="{{ route('logout') }}" class="">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            </form>
        </div>
    </div> 
</nav>

    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-semibold mb-4">Admin Dashboard</h2>
        <table class="min-w-full">
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
                            <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-blue-500 text-white px-4 py-2 mx-1 rounded btn">Edit</a>

                            {{-- Delete User --}}
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 mx-1 rounded btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
