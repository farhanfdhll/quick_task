<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()){
            if(Auth::user()->is_admin == 0){
                $tc = TaskCart::where('user_id', '=', Auth::user()->id)->first();
                $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('is_important', 'desc')->orderBy('due_date', 'asc')->get();

                if(request('filter') && !request('sort')){
                    $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('is_important', 'desc')->orderBy('due_date', 'asc');
                    if(request('filter') == 1){
                        $task->where('is_important', '=', 1);
                    }else if(request('filter') == 2){
                        $task->where('status', '!=', 'Done');
                    }else if(request('filter') == 3){
                        $task->where('status', '=', 'Done');
                    }
                    $task = $task->get();

                    if(request('sort') == 1){
                        $task = $task->orderBy('due_date', 'asc');
                    }else if(request('sort') == 2){
                        $task = $task->orderBy('status', 'asc')->orderBy('due_date', 'asc');
                    }else if(request('sort') == 3){
                        $task = $task->orderBy('is_important', 'desc')->orderBy('due_date', 'asc');
                    }else if(request('sort') == 4){
                        $task = $task->orderBy('name', 'asc')->orderBy('due_date', 'asc');
                    }
                }

                if(request('sort') && !request('filter')){
                    if(request('sort') == 1){
                        $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('due_date', 'asc')->get();
                    }else if(request('sort') == 2){
                        $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('status', 'asc')->orderBy('due_date', 'asc')->get();
                    }else if(request('sort') == 3){
                        $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('is_important', 'desc')->orderBy('due_date', 'asc')->get();
                    }else if(request('sort') == 4){
                        $task = DB::table('tasks')->where('cart_id', '=', $tc->id)->orderBy('name', 'asc')->orderBy('due_date', 'asc')->get();
                    }
                }
                return view('home')->with('task', $task);
            }else{
                return view('home');
            }
        }else{
            return view('home');
        }

    }
}
