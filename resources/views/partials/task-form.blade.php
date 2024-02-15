<form method="post" action="{{ route('admin.tasks.store') }}">
    @csrf

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" required>
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea>
    </div>

    <div>
        <label for="assigned_to">Assign To:</label>
        <select name="assigned_to" required>
            @foreach($users as $user)
            <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>
    <br>
    <button type="submit">Assign Task</button>
</form>