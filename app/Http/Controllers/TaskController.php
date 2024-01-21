<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{

    public function retrieveUsers()
    {
        $users = User::where('roles', User::ROLE_USER)->get();
        return view('admin.tasks.create', compact('users'));
    }

    public function retrieveTasks()
    {
        $tasks = Task::with('user')->get();
        $users = User::where('roles', User::ROLE_USER)->get();
    
        return view('admin.tasks.index', compact('tasks', 'users'));
    }
    
    public function saveTask(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'assigned_to' => 'required|exists:users,id',
        ]);
    
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'assigned_to' => $request->assigned_to,
        ]);
    
        return redirect()->route('admin.tasks.index')->with('success', 'Task assigned successfully!');
    }
}
