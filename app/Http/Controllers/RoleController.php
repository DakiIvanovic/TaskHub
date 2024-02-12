<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Checks if the currently logged user is an admin or a user and redirects accordingly with data.
     */
    public function checkRoleRedirect()
    {
        $user = auth()->user();

        if ($user->roles === 'admin') {
            $users = User::where('roles', 'user')->get();
            return view('admin.dashboard', compact('users'));
        } else {
            $userTasks = Task::where('assigned_to', $user->id)->get();
            return view('user.dashboard', compact('userTasks'));
        }
    }
}
