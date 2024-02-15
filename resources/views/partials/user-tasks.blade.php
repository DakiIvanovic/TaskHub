@foreach($tasks as $task)
<div class="mb-4">
    <h3 class="text-xl font-semibold">{{ $task->title }}</h3>
    <p class="text-gray-600 mb-2">{{ $task->description }}</p>
    <p class="text-gray-500">Assigned at: {{ $task->created_at->format('Y-m-d H:i:s') }}</p>
    <hr>
</div>
@endforeach