<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function addTaskPage(){
        return view('member.add-task');
    }

    public function store(Request $req){

        $tc = DB::table('tasks_cart')->where('user_id', '=', Auth::user()->id)->first();
        $validator = Validator::make($req->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'is_important' => ['required', 'integer']
        ]);

        if($validator->fails()){
            return redirect()->back()->with('failed', 'Failed to add task, please make sure all the data you have inputted is correct!');
        }

        $new_task = new Task();
        $new_task->name = $req->name;
        $new_task->description = $req->description;
        $new_task->cart_id = $tc->id;
        $new_task->due_date = $req->due_date;
        $new_task->is_important = $req->is_important;
        $new_task->save();

        return redirect()->back()->with('success', 'Successfully added task!');
    }

    public function delete(Task $task){
        // dd($task);
        DB::table('tasks')->where('id' , '=', $task->id)->delete();

        return redirect()->back();
    }
    
    public function markPriority(Task $task){
        if($task->is_important == 1){
            DB::table('tasks')->where('id' , '=', $task->id)->update(['is_important' => 0]);
        }else{
            DB::table('tasks')->where('id' , '=', $task->id)->update(['is_important' => 1]);
        }

        return redirect()->back();
    }
    public function markStatusDone(Task $task){

        DB::table('tasks')->where('id' , '=', $task->id)->update(['status' => 'Done']);

        return redirect()->back();
    }

    public function markStatusProgress(Task $task){

        DB::table('tasks')->where('id' , '=', $task->id)->update(['status' => 'On Progress']);

        return redirect()->back();
    }

    public function editTaskPage(Task $task){
        $task = DB::table('tasks')->where('id', '=' ,$task->id)->first();
        // dd($task);
        return view('member.edit-task')->with('task', $task);
    }

    public function update(Request $req, Task $task){
        $tc = DB::table('tasks_cart')->where('user_id', '=', Auth::user()->id)->first();

        $validator = Validator::make($req->all(), [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'due_date' => ['required', 'date', 'after_or_equal:today'],
            'is_important' => ['required', 'integer']
        ]);

        if($validator->fails()){
            return redirect()->back()->with('failed', 'Failed to add task, please make sure all the data you have inputted is correct!');
        }

        DB::table('tasks')->where('cart_id', '=', $tc->id)->where('id', '=', $task->id)->update(['name' => $req->name, 'description' => $req->description, 'due_date' => $req->due_date, 'is_important' => $req->is_important]);

        return redirect()->back()->with('success', 'Successfully updated task!');
    }
}
