<form method="GET" action="{{ url('/user/inbox') }}" class="flex items-center space-x-2">
    <input type="text" name="searchQueryInbox"
        value="{{ isset($query) ? $query : '' }}"
        placeholder="Search by name or email" class="flex-1 px-4 py-2 border border-gray-300 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500">
    <button type="submit"
        class="bg-blue-500 text-white px-6 py-2 rounded-r hover:bg-blue-600 transition-colors duration-200 ease-in-out"><i class="fas fa-search"></i></button>
</form>
