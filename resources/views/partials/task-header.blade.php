<nav>
    <div>
        <a href="{{  route('admin.dashboard') }}">Task Management</a>
        <div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>