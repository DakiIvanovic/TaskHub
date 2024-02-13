<form method="post" action="{{ route('admin.tasks.store') }}" class="space-y-4">
    @csrf

            <div class="space-y-2">
                <label for="title" class="block font-medium text-gray-700">Title:</label>
                <input type="text" name="title"
                    class="form-input rounded-md shadow-sm mt-1 block w-full focus:outline-none focus:ring focus:border-blue-500"
                    required>
            </div>

            <div class="space-y-2">
                <label for="description" class="block font-medium text-gray-700">Description:</label>
                <textarea name="description"
                    class="form-input rounded-md shadow-sm mt-1 block w-full focus:outline-none focus:ring focus:border-blue-500"
                    rows="4" required></textarea>
            </div>

            <div class="space-y-2">
                <label for="assigned_to" class="block font-medium text-gray-700">Assign To:</label>
                <select name="assigned_to"
                    class="form-select rounded-md shadow-sm mt-1 block w-full focus:outline-none focus:ring focus:border-blue-500"
                    required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring focus:border-blue-500">Assign
                Task</button>
        </form>
