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
</head>

<body class="bg-gray-100 font-sans">

    <nav class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-2xl font-semibold">Task Management</a>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-300 transition duration-300">Back</a>
                <form method="POST" action="#">
                    @csrf
                    <button type="submit" class="hover:text-red-300 transition duration-300">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4 text-center">Chats</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($users as $user)
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <div class="bg-blue-500 text-white p-2 rounded-t-lg text-center">
                        <h3 class="text-lg font-semibold">{{ $user->name }}</h3>
                    </div>

                    <div class="chat-messages mt-4 h-40 overflow-y-auto">
                        @forelse ($userMessages[$user->id] as $message)
                            <div class="{{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200' }} p-2 rounded-lg mb-2">
                                <p class="text-sm">
                                    <strong>{{ $message->sender_name }}:</strong>
                                    {{ $message->text }}
                                </p>
                                @if ($message->image_path)
                                    <img src="{{ asset($message->image_path) }}" alt="Image"
                                        class="mt-1 max-w-full h-16 rounded-lg">
                                @endif
                                <div class="text-gray-500 text-xs">{{ $message->created_at }}</div>
                            </div>
                        @empty
                            <p class="text-center text-gray-500">No messages yet.</p>
                        @endforelse
                    </div>

                    <div class="reply-container mt-4">
                        <form action="#" method="POST" enctype="multipart/form-data"
                            class="flex items-center space-x-2">
                            @csrf
                            <input type="hidden" name="sender_id" value="{{ $user->id }}">
                            <textarea name="msg" rows="2" class="flex-1 p-2 rounded-lg"
                                placeholder="Type a message..."></textarea>
                            <label class="flex items-center space-x-2">
                                <input type="file" name="image" accept="image/*" class="hidden">
                                <span
                                    class="bg-blue-500 text-white px-3 py-1 rounded-full cursor-pointer hover:bg-blue-700 transition duration-300">Attach</span>
                            </label>
                            <button
                                class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-700 transition duration-300"
                                type="submit">Send</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
