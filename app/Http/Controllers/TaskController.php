<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {
        $id = \Auth::id();
        $tasks = \DB::table('tasks')
                ->select('*')
                ->where('user_id', $id)
                ->get();
        return view('task')->with('tasks', $tasks);
    }
    
    public function show(Task $task) {
        $task = \DB::table('tasks')
                ->select('*')
                ->where('user_id', \Auth::id())
                ->Where('id', $task->id)
                ->first();
        if(is_null($task)) {
            session()->flash('error', 'Access Denied');
            return redirect('/task');
        } else {
            return view('show')->with('task', $task);
        }
    }

    public function complete(Task $task) {
        $aff = \DB::table('tasks')
                ->select('*')
                ->where('user_id', \Auth::id())
                ->where('id', $task->id)
                ->update(['completed' => $task->completed ^ 1]);
        if($aff > 0) {
            $msg = "";
            if($task->completed == 0)
                $msg = 'Task Completed Successfully !';
            else 
                $msg = 'Task Uncompleted Successfully !';
            session()->flash('success', $msg);
            return redirect('/task');
        } else {
            session()->flash('error', 'Access Denied');
            return redirect('/task');
        }
    }

    public function create() {
        return view('newtask');
    }

    public function store() {
        $data = request()->all();
        $this->validate(request(),  [
            'name' => 'required',
            'description' => 'required'
        ]);
        $task = new Task;
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->user_id = \Auth::id();
        $task->save();
        session()->flash('success', 'Task Created Successfully !');
        return redirect('/task');
    }

    public function delete(Task $task) {
        $row = \DB::table('tasks')
                ->select('*')
                ->where('user_id', \Auth::id())
                ->Where('id', $task->id)
                ->delete();
        if($row == 0) {
            session()->flash('error', 'Access Denied');
            return redirect('/task');
        } else {
            session()->flash('success', 'Task Deleted Successfully !');
            return redirect('/task');
        }
    } 

    public function edit(Task $task) {
        $task = \DB::table('tasks')
                ->select('*')
                ->where('user_id', \Auth::id())
                ->Where('id', $task->id)
                ->first();
        if(is_null($task)) {
            session()->flash('error', 'Access Denied');
            return redirect('/task');
        } else {
            return view('/edit')->with('task', $task); 
        }
    }

    public function update(Task $task) {
        $data = request()->all();
        $this->validate(request(),  [
            'name' => 'required',
            'description' => 'required'
        ]);
        $task->name = $data['name'];
        $task->description = $data['description'];
        $task->save();
        session()->flash('success', 'Task Updated Successfully !');
        return redirect('/task');
    }
}