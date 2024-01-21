<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
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

    <h2 class="text-xl font-semibold mb-4">User Dashboard</h2>

    <div class="">
        <h5>Your Assigned Tasks</h5>

        @foreach ($userTasks as $task)
            <div class='p-4 border-b border-gray-200'>
                <h6>Title: {{ $task->title }}</h6>
                <p>Description: {{ $task->description }}</p>
            </div> 
        @endforeach

    </div> 
</div> 

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html> 
