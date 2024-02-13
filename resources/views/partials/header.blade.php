<nav class="bg-transparent p-4">
    <div class="container mx-auto flex items-center justify-between">
        <a href="#" class="text-2xl text-gray-800 font-semibold ml-2 mr-7">Task Management</a>

        @include('partials.search-form')

        <div class="flex items-center space-x-4 ml-auto">
            <a href="{{ route('admin.tasks.index') }}" class="text-gray-800 hover:text-blue-600 transition duration-300">Assign Task</a>

            @include('partials.logout-form')
        </div>
    </div>
</nav>