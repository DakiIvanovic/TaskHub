<nav class="bg-blue-500 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{ route('user.dashboard') }}" class="text-white text-lg font-bold">Task Management</a>
        <a href="{{ route('user.inbox') }}" class="text-white flex items-center">
            <i class="fas fa-comments"></i>
            <span class="ml-2">Chat</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
            @csrf
            <p class="text-white mr-4">Hello, {{ auth()->user()->name }}</p>
            <button type="submit" class="bg-white text-blue-500 py-1 px-3 rounded">Logout</button>
        </form>
    </div>
</nav>