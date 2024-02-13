<table class="min-w-full border rounded-md overflow-hidden">
<div class="container mx-auto mt-8">
        <div class="overflow-x-auto">
            <table class="min-w-full border rounded-md overflow-hidden">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-3 px-6 text-center">Name</th>
                        <th class="py-3 px-6 text-center">Email</th>
                        <th class="py-3 px-6 text-center">Role</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="{{ $loop->even ? 'bg-gray-300' : 'bg-gray-200' }}">
                            <td class="py-3 px-6 text-center">{{ $user->name }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->email }}</td>
                            <td class="py-3 px-6 text-center">{{ $user->roles }}</td>
                            <td class="py-3 px-6 text-center space-x-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded transition duration-300 hover:scale-105 btn">Edit</a>

                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded transition duration-300 hover:scale-105 btn">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</table>