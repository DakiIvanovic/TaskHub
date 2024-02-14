<form method="GET" action="{{ url('/admin/dashboard') }}" class="flex items-center">
    <input type="text" name="query" value="{{ isset($query) ? $query : '' }}"
        placeholder="Search by name or email" class="px-4 py-2 border rounded-l">
    <button type="submit"
        class="bg-blue-500 text-white px-6 py-2 rounded-r transition duration-300 hover:scale-105">Search</button>
</form>
