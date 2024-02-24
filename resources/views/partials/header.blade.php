<nav class="bg-gray-800 p-4 flex items-center justify-between text-white">
    <div class="container mx-auto flex justify-between items-center">
        <a href="{{  route('admin.dashboard') }}" class="text-white text-2xl font-bold">Task Management</a>

        @include('partials.search-form')

        <div class="ml-4">
            <a href="{{ route('admin.tasks.index') }}" class="text-white hover:underline">Task list</a>
            @include('partials.logout-form')
        </div>
    </div>
</nav>