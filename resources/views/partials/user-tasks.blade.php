@foreach($tasks as $task)
    <div class='bg-white rounded-md p-4 mb-4 shadow-md'>
        <h3 class="text-xl font-semibold mb-2">Title: {{ $task->title }}</h3>
        <p class="text-gray-700">Description: {{ $task->description }}</p>
        <p class="text-gray-500">Assigned at:
            {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
    </div>
@endforeach
