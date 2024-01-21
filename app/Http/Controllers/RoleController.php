<?php

namespace App\Http\Controllers;

use App\Models\Task;

class RoleController extends Controller
{
    
    /**
     * Checks if currrently logged user is admin or user and redirects accordingly with data.
     */
    public function checkRoleRedirect()
    {
        $user = auth()->user();

        if($user->roles == 'admin'){
            $tasks = Task::all();
            return view('admin.tasks.index', compact('tasks'));
        }else{
            $userTasks = Task::where('assigned_to', $user->id)->get();
            return view('user.dashboard', compact('userTasks'));
        }
    }
}
