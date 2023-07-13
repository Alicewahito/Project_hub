<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index() {
        return view('tasks.index', ['tasks' => Task::all()]);
    }

    public function store(Request $request) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'startDate'=>'required',
            'endDate'=>'required',
        ]);

        $task = new Task();

        $task->title = $request->title;
        $task->description = $request->description;
        $task->start_date = $request->startDate;
        $task->end_date = $request->endDate;

        $task->save();

        return back()->with('success', 'Task added successfully');
    }

    public function update(Request $request, $id) {
        Validator::make($request->all(),[
            'title'=>'required',
            'description'=>'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $task = Task::findOrFail($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->start_date = $request->startDate;
        $task->end_date = $request->endDate;


        $task->save();
        
        return back()->with('success', 'Task updated successfully');
    }

    public function destroy($id) {
        $task = Task::findOrFail($id);
        $task->delete();
        return back()->with('success', 'Task deleted successfully');
    }
}
