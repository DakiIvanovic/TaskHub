<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/user.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100">

    @include('partials.user-user-header')

    <div class="container mx-auto my-8">
        <div class="bg-white p-8 rounded shadow">
            <h2 class="text-2xl font-semibold mb-4">User Dashboard</h2>

            <div>
                <h5 class="text-lg font-semibold mb-2">Your Assigned Tasks</h5>
                @include('partials.user-tasks', ['tasks' => $userTasks])
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/user.js') }}"></script>
</body>

    @include('partials.footer')

</html>
