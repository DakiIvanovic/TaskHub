<div class="grid grid-cols-3 gap-4">
    @foreach($users as $user)
        <div class="card bg-white shadow-lg rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 ease-in-out">
            <div class="card-header p-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
                <div class="flex items-center space-x-2">
                    @if($user->online)
                        <span class="text-sm text-green-500">Online</span>
                        <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                    @else
                        <span class="text-sm text-gray-500">Offline</span>
                        <span class="w-3 h-3 bg-gray-500 rounded-full"></span>
                    @endif
                </div>
            </div>

            <div class="card-body p-4 h-48 overflow-y-auto">
                @forelse($userMessages[$user->id] as $message)
                    <div
                        class="message {{ $message->sender_id === auth()->id() ? 'self' : 'other' }}">
                        <p class="text-sm">
                            <strong class="text-gray-800">{{ $message->sender_name }}:</strong>
                            {{ $message->text }}
                        </p>
                        @if($message->image_path)
                            <img src="{{ asset($message->image_path) }}" alt="Image"
                                class="w-32 h-32 object-cover mt-2 rounded-lg">
                        @endif
                        <div class="text-xs text-gray-500">{{ $message->created_at }}</div>
                    </div>
                @empty
                    <p class="text-sm text-gray-600">No messages yet.</p>
                @endforelse
            </div>

            <div class="card-footer p-4 flex items-center space-x-4">
                <form action="{{ route('user.replyStore') }}" method="POST"
                    enctype="multipart/form-data" class="flex-1">
                    @csrf
                    <input type="hidden" name="sender_id" value="{{ $user->id }}">
                    <div class="flex items-center space-x-2">
                        <textarea name="msg" rows="1" class="flex-1 border border-gray-300 rounded-lg p-2 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Type a message..."></textarea>
                        <label class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-lg cursor-pointer hover:bg-gray-200 transition-colors duration-200 ease-in-out">
                            <input type="file" name="image" accept="image/*" class="hidden">
                            <i class="fas fa-paperclip text-gray-600"></i>
                        </label>
                        <button class="flex items-center justify-center w-10 h-10 bg-blue-500 rounded-lg text-white hover:bg-blue-600 transition-colors duration-200 ease-in-out" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach
</div>
