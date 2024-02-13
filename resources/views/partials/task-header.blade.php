<nav class="bg-transparent p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>
        <div class="ml-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
            </form>
        </div>
    </div>
</nav>