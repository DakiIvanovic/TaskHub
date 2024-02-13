<nav class="bg-transparent p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="{{ route('user.dashboard') }}" class="text-2xl text-gray-800 font-semibold">Task Management</a>
        <a href="{{ route('user.inbox') }}"
            class="text-gray-800 hover:text-blue-600 transition duration-300 flex items-center">
            <i class="far fa-envelope fa-lg mr-2"></i>
            <span>Chat</span>
        </a>
        <form method="POST" action="{{ route('logout') }}" class="flex items-center">
            @csrf
            <p class="mr-2">Hello, {{ auth()->user()->name }}</p>
            <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            <a href=""></a>
        </form>
    </div>
</nav>