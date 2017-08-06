<?php

namespace App\Http\Controllers;
use App\Task;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function show(Task $task) { //Here you're saying 'I expect a task to be passed' and the function does a Task::find($task) for you. It's called Route Model Binding
        return view('tasks.show', ['task' => $task]);
    }
}
