<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- Add some custom styles -->
    <style>
        body {
            background: linear-gradient(to right, #f0f2f0, #96deda);
        }
        .card {
            border: 1px solid #e2e8f0;
            border-radius: 0.5rem;
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
        }

        .card:hover {
            transform: scale(1.02);
            transition: all 0.3s ease-in-out;
        }

        .card-body {
            padding: 1.5rem;
        }

        .card-title {
            margin-bottom: 0.5rem;
        }

        .card-text {
            margin-bottom: 0.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.5rem 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #4299e1;
            color: #ffffff;
        }

        .btn-primary:hover {
            background-color: #3182ce;
        }
    </style>
</head>
<body class="bg-gray-100">

<nav class="bg-white p-4 shadow-lg">

    <div class="flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>
        <!-- Add the ml-auto class to the div containing the buttons -->
        <div class="ml-auto">
            <form method="POST" action="{{ route('logout') }}" class="">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            </form>
        </div>
    </div> 
</nav>

<div class="container mx-auto mt-10 p-4 max-w-3xl bg-white rounded-lg shadow-md">

    <h2 class="text-xl font-semibold mb-4">Task List</h2>

    <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($tasks as $task)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-lg font-semibold mb-2">Title: {{ $task->title }}</h5>
                    <p class="card-text">Description: {{ $task->description }}</p>
                    <p class="card-text">Assigned to: {{ optional($task->user)->name }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex justify-between mt-4">
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary">Assign Task</a>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Return to admin dashboard</a>
    </div>

</div> 

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="//code.jquery.com/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
