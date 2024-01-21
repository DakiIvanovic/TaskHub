<?php

namespace App\Http\Controllers;

use App\Models\Task;

class UserDashboardController extends Controller
{

    /**
     * Gets currently logged user and tasks assigned to him
     */
    public function userTasks()
    {
        // Assuming you are using Jetstream or similar authentication
        $user = auth()->user();

        // Fetch tasks assigned to the logged-in user
        $userTasks = Task::where('assigned_to', $user->id)->get();

        return view('user.dashboard', compact('userTasks'));
    }
}
