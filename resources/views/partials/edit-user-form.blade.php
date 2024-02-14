<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-semibold mb-8 text-center text-gray-800">Edit User</h2>

    <form method="POST" action="{{ route('admin.users.update', $user->id) }}"
        class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
            <input type="email" name="email" id="email" value="{{ $user->email }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 font-bold mb-2">Role:</label>
            <input disabled type="text" name="role" id="role" value="{{ $user->roles }}"
                class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:shadow-md">Update User</button>
            <a href="{{ route('admin.dashboard') }}"
                class="text-gray-600 px-4 py-2 rounded hover:text-blue-600 hover:bg-gray-200">Cancel</a>
        </div>
    </form>
</div>
