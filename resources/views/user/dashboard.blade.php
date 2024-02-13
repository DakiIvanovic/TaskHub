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

    <!-- External CSS file for custom styles -->
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-to-r from-green-200 to-blue-200 min-h-screen">

    @include('partials.user-header')

    <div class="container mx-auto">
        <div class="bg-white rounded-lg overflow-hidden shadow-md p-6 mt-10">

            <h2 class="text-3xl font-semibold mb-4">User Dashboard</h2>

            <div>
                <h5 class="text-lg font-semibold mb-2">Your Assigned Tasks</h5>

                @include('partials.user-tasks', ['tasks' => $userTasks])
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <!-- External JavaScript file for custom scripts -->
    <script src="{{ asset('js/user.js') }}"></script>
</body>

</html>
