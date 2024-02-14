<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-gray-800 hover:text-red-600 transition duration-300">Logout</button>
</form>
