<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    <nav class="bg-transparent p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="{{ route('user.dashboard') }}" class="text-2xl text-gray-800 font-semibold">Task
                Management</a>
            <a href="{{ route('user.inbox') }}"
                class="text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
                <i class="far fa-envelope fa-lg mr-2"></i>
                <span>Chat</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="bg-white rounded-lg overflow-hidden shadow-md p-6 mt-10">

            <h2 class="text-3xl font-semibold mb-4">User Dashboard</h2>

            <div>
                <h5 class="text-lg font-semibold mb-2">Your Assigned Tasks</h5>

                @foreach($userTasks as $task)
                    <div class='bg-white rounded-md p-4 mb-4 shadow-md'>
                        <h3 class="text-xl font-semibold mb-2">Title: {{ $task->title }}</h3>
                        <p class="text-gray-700">Description: {{ $task->description }}</p>
                        <p class="text-gray-500">Assigned at:
                            {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>
