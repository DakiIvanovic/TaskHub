<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>

    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background: linear-gradient(to right, #f0f2f0, #96deda);
        }

        .container {
            margin: 50px auto;
        }

        .nav-container {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-container a {
            color: #1a202c;
        }

        .nav-container button {
            color: #1a202c;
        }

        .task-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .task-container h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .task-item {
            padding: 16px;
            border-bottom: 1px solid #e2e8f0;
        }

        .task-item h3 {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .task-item p {
            color: #4a5568;
        }
    </style>
</head>

<body>

    <nav class="nav-container p-4 shadow-lg">
        <div class="flex items-center justify-between">
            <a href="#" class="text-2xl text-gray-800 font-semibold">Task Management</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container mx-auto">
        <div class="task-container">
            <h2 class="text-xl font-semibold mb-4">User Dashboard</h2>

            <div class="">
                <h5>Your Assigned Tasks</h5>

                @foreach ($userTasks as $task)
                <div class='task-item'>
                    <h3>Title: {{ $task->title }}</h3>
                    <p>Description: {{ $task->description }}</p>
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
