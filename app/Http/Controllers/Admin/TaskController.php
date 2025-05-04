<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('user')->get(); // Fetch tasks with assigned user
        $users = User::where('is_admin', false)->get(); // Fetch non-admin users
        return view('admin.task_manage', compact('tasks', 'users'));
    }

    public function create()
    {
        $users = User::where('is_admin', false)->get(); // Fetch non-admin users
        return view('admin.create_task', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        Task::create([
            'user_id' => $request->user_id,
            'task' => $request->task,
        ]);

        return redirect()->route('admin.task_manage')->with('success', 'Task created successfully.');
    }

    public function assignTask(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->tasks()->create([
            'task' => $request->task,
        ]);

        return redirect()->route('admin.task_manage')->with('success', 'Task assigned successfully.');
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $users = User::where('is_admin', false)->get(); // Fetch non-admin users
        return view('admin.edit_task', compact('task', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'task' => 'required|string|max:255',
        ]);

        $task = Task::findOrFail($id);
        $task->update([
            'user_id' => $request->user_id,
            'task' => $request->task,
        ]);

        return redirect()->route('admin.task_manage')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.task_manage')->with('success', 'Task deleted successfully.');
    }
}
