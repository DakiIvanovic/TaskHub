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

<body>

    @include('partials.chat-interface-header', ['users' => $users])

    <div>
        @include('partials.chat-cards', ['users' => $users, 'userMessages' => $userMessages])
    </div>

    <script src="{{ asset('js/chat-interface.js') }}"></script>

    @include('partials.footer')


</body>

</html>
