<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function manageUsersPage(){
        return view('admin.musers')->with('user', User::all());
    }
}
