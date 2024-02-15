<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Interface</title>
    <!-- Include Tailwind CSS from CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <!-- Include Font Awesome from CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- External CSS file for custom styles -->
    <link href="{{ asset('css/chat-interface.css') }}" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">

    @include('partials.chat-interface-header', ['users' => $users])

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Chats</h2>

        @include('partials.chat-cards', ['users' => $users, 'userMessages' => $userMessages])
    </div>

    <!-- External JavaScript file for custom scripts -->
    <script src="{{ asset('js/chat-interface.js') }}"></script>
</body>

</html>
