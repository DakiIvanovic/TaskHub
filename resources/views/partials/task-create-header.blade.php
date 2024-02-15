<nav>
    <div class="flex justify-between items-center">
        <a href="{{  route('admin.dashboard')  }}" class="text-lg font-semibold">Task Management</a>
        <div> 
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-white text-blue-900 px-4 py-2 rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>