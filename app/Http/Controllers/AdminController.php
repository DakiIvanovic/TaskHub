<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;


class AdminController extends Controller
{
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function destroy(User $user)
    {
        // Retrieve and delete tasks associated with the user
        $userTasks = Task::where('assigned_to', $user->id)->get();
        foreach ($userTasks as $task) {
            $task->delete();
        }

        $user->delete();

        return redirect()->back();
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user->fill([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        
        $user->save();

        return redirect()->away('/dashboard')->with('success','User updated successfully.');
    }


}
