<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-100">

<nav class="bg-white p-4 shadow-lg">
    <div class="flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold">Task Management</a>

        <form method="POST" action="{{ route('logout') }}" class="">
            @csrf
            <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
        </form>
    </div> 
</nav>

<div class="container mx-auto mt-10 p-4 max-w-xl bg-white rounded-lg shadow-md">

    <h2 class="text-xl font-semibold mb-4">Assign Task</h2>

    <form method="post" action="{{ route('admin.tasks.store') }}" class="space-y-4">
        @csrf
        <div class="space-y-2">
            <label for="title" class="block font-medium text-gray-700">Title:</label>
            <input type="text" name="title" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
        </div>
        <div class="space-y-2">
            <label for="description" class="block font-medium text-gray-700">Description:</label>
            <textarea name="description" class="form-input rounded-md shadow-sm mt-1 block w-full" rows="4" required></textarea>
        </div>
        <div class="space-y-2">
            <label for="assigned_to" class="block font-medium text-gray-700">Assign To:</label>
            <select name="assigned_to" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Assign Task</button>
    </form>
</div> 

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html> 
