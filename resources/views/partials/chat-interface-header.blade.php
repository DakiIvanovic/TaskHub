<nav class="bg-gray-800 p-4 flex items-center justify-between text-white">
    <div class="flex items-center space-x-4">
        <a href="#" class="text-xl font-bold hover:underline">Chats</a>
        @include('partials.search-form-inbox')
    </div>
    <div>
        <form method="POST" action="{{ route('logout') }}" class="flex items-center space-x-2">
            @csrf
            <a href="{{ route('user.dashboard') }}" class="text-sm hover:underline">Back</a>
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 ease-in-out">Logout</button>
        </form>
    </div>
</nav>
