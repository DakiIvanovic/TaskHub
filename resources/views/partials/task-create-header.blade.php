<nav class="bg-gray-800 p-4 text-white">
    <div class="flex justify-between items-center">
        <a href="{{  route('admin.dashboard')  }}" class="text-lg font-semibold">Task Management</a>
        <div> 
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-4 py-2 rounded-lg hover:bg-red-600 transition-colors duration-200 ease-in-out">Logout</button>
            </form>
        </div>
    </div>
</nav>