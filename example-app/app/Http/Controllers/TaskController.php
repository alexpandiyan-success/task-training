<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
    public function view()
    {

        $tasks = Task::all();

        return view('tasks', compact('tasks'));
    }
    public function store(Request $request)
    {
        $messages = [
            'task_name.required' => 'please enter task name'
        ];
        $request->validate([
            'task_name' => 'required'
        ], $messages);

        $task = new Task;
        $task->task_name = $request->task_name;
        if ($task->save()) {
            return view('dashboard');
        }
    }
    public function show($id)
    {
        $show = Task::findOrFail($id);

        return ($show);
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'task_name.required' => 'please enter task name'
        ];
        $request->validate([
            'task_name' => 'required'
        ], $messages);

        $post = Task::findOrFail($id);
        $post->task_name = $request->task_name;
        if($post->save()){
            return ("updated successfully");
        }

    }
}
