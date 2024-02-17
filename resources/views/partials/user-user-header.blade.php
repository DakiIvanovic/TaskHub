<nav class="bg-gray-800 p-4 flex items-center justify-between text-white"">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('user.dashboard') }}" class="text-white text-lg font-bold">Task Management</a>
        <a href="{{ route('user.inbox') }}" class="text-white flex items-center">
            <i class="fas fa-comments"></i>
            <span class="ml-2">Chat</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
            @csrf
            <p class="text-white mr-4">Hello, {{ auth()->user()->name }}</p>
            <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 ease-in-out text-white">Logout</button>
        </form>
    </div>
</nav>