<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;

class TaskController extends Controller
{
    public function retrieveUsers()
    {
        return view('admin.tasks.create', ['users' => User::where('roles', User::ROLE_USER)->get()]);
    }

    public function retrieveTasks()
    {
        return view('admin.tasks.index', [
            'tasks' => Task::with('user')->get(),
            'users' => User::where('roles', User::ROLE_USER)->get(),
        ]);
    }

    public function saveTask(Request $request)
    {
        $this->validateTaskRequest($request);

        Task::create($request->only(['title', 'description', 'assigned_to']));

        return redirect()->route('admin.tasks.index')->with('success', 'Task assigned successfully!');
    }

    private function validateTaskRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'assigned_to' => 'required|exists:users,id',
        ]);
    }
}
