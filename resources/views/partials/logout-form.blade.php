<form method="POST" action="{{ route('logout') }}" class="inline-block ml-4">
    @csrf
    <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-500 focus:outline-none">Logout</button>
</form>