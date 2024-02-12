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
    <style>
        body {
            background: linear-gradient(to right, #f0f2f0, #96deda);
            font-family: 'Poppins', sans-serif;
            color: #2c3e50;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .chat-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .chat-card {
            width: calc(33.33% - 20px);
            margin-bottom: 20px;
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .chat-card:hover {
            transform: scale(1.05);
        }

        .chat-header {
            padding: 16px;
            background-color: #3498db;
            color: #fff;
            border-bottom: 1px solid #2980b9;
        }

        .chat-messages {
            max-height: 200px;
            overflow-y: auto;
            padding: 16px;
        }

        .message-card {
            margin-bottom: 12px;
            padding: 8px;
            background-color: #ecf0f1;
            border-radius: 4px;
        }

        .sent-message {
            background-color: #3498db;
            color: #fff;
        }

        .received-message {
            background-color: #ecf0f1;
        }

        .reply-container {
            padding: 16px;
            border-top: 1px solid #2980b9;
            transition: transform 0.3s ease-in-out;
        }

        .reply-container:hover {
            transform: translateY(-5px);
        }

        .textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 12px;
            resize: vertical;
        }

        .btn {
            background-color: #3498db;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        /* Additional styling for responsiveness */
        <blade media|%20(max-width%3A%20768px)%20%7B>.chat-card {
            width: calc(50% - 20px);
        }
        }

        <blade media|%20(max-width%3A%20480px)%20%7B>.chat-card {
            width: 100%;
        }
        }

    </style>
</head>

<body class="p-8 relative">

    <div class="container">
        <nav class="nav-container p-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('user.dashboard') }}"
                    class="text-2xl text-gray-800 font-semibold">Task Management</a>
                <a href="{{ route('user.dashboard') }}"
                    class="text-gray-800 hover:text-blue-600 transition duration-300" style="float: rightl;">Back</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
                </form>
            </div>
        </nav>

        <h2 class="text-3xl font-semibold mb-8 text-center">Chats</h2>

        <div class="chat-container">
            @foreach($users as $user)
                <div class="chat-card">
                    <div class="chat-header bg-blue-500">
                        <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                    </div>

                    <div class="chat-messages">
                        @forelse($userMessages[$user->id] as $message)
                            <div
                                class="message-card {{ $message->sender_id === auth()->id() ? 'sent-message' : 'received-message' }}">
                                <strong>{{ $message->sender_name }}:</strong>
                                @if($message->image_path)
                                    <img src="{{ asset($message->image_path) }}" alt="Image"
                                        style="max-width: 200px; max-height: 200px;">
                                @endif
                                {{ $message->text }}
                                <div class="text-white-500 text-sm">{{ $message->created_at }}</div>
                            </div>
                        @empty
                            <p class="text-center">No messages yet.</p>
                        @endforelse
                    </div>

                    <div class="reply-container">
                        <form action="{{ route('user.replyStore') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="sender_id" value="{{ $user->id }}">
                            <textarea name="msg" rows="4" class="textarea" placeholder="Start a new chat"></textarea>
                            <input style="margin-bottom:20px;"type="file" name="image" accept="image/*">
                            <button class="btn" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
