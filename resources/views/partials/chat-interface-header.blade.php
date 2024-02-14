<nav class="bg-pink-800 text-white p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="#" class="text-2xl font-semibold">Task Management</a>
        <div class="flex space-x-4">
            <a href="{{ route('user.dashboard') }}"
                class="hover:text-blue-300 transition duration-300">Back</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:text-red-300 transition duration-300">Logout</button>
            </form>
        </div>
    </div>
</nav>
