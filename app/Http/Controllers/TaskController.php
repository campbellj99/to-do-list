<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks; // Import the Tasks model

class TaskController extends Controller
{
    public function index() {
        $tasks = Tasks::all();
        return view('tasks', compact('tasks'));
    }

    public function create(Request $request) {
	    $validatedData = $request->validate([
	        'name' => 'required|string|max:255',
	    ]);
	    $task = Tasks::create([
	        'name' => $validatedData['name'],
	        'complete' => 0,
	    ]);
	    return redirect()->route('tasks.index')->with('success', 'Task created successfully');

    }

	public function delete(Request $request) {
    	$task = Tasks::find($request->id);

	    // Check if the task exists
	    if (!$task) {
	        // Handle the case where the task does not exist (e.g., show an error message)
	        return redirect()->route('tasks.index')->with('error', 'Task not found');
	    }

	    // Delete the task
	    $task->delete();
    	return redirect()->route('tasks.index')->with('success', 'Task created successfully');
	}

	public function complete(Request $request) {
	    $task = Tasks::find($request->id);

	    if (!$task) {
	        return redirect()->route('tasks.index')->with('error', 'Task not found');
	    }


	    $task->update(['complete' => !$task->complete]);

	    return redirect()->route('tasks.index')->with('success', 'Task completed successfully');
	}


}