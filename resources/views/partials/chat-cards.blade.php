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
                        <form action="{{ route('user.replyStore') }}" method="POST" enctype="multipart/form-data"
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
                            <button class="bg-blue-500 text-white px-4 py-1 rounded-full hover:bg-blue-700 transition duration-300" type="submit">Send</button>
                        </form>
                    </div>
                </div>
            @endforeach
</div>