<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function searchUserByNameOrEmail(Request $request)
    {
        $query = $request->input('query', '');

        $users = User::where('roles', 'user')
            ->where(function ($queryBuilder) use ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%');
            })
            ->get();

        return view('admin.dashboard', compact('query', 'users'));
    }

    public function editUser(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function deleteUser(User $user)
    {
        $this->deleteUserTasks($user);

        $user->delete();

        return redirect()->back();
    }

    public function updateUser(Request $request, User $user)
    {
        $this->validateUserUpdateRequest($request, $user);

        $user->fill($request->only(['name', 'email']));
        $user->save();

        return redirect()->away('/dashboard')->with('success', 'User updated successfully.');
    }

    private function deleteUserTasks(User $user)
    {
        $userTasks = Task::where('assigned_to', $user->id)->get();
        $userTasks->each->delete();
    }

    private function validateUserUpdateRequest(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);
    }
}
