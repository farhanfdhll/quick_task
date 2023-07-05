<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function viewProfilePage(){
        return view('view-profile')->with('user', Auth::user());
    }

    public function updateProfile(Request $request, User $user){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'gender' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile', $user)->with('failed', 'Failed to update user in database.');
        }

        DB::table('users')->where('id', $user->id)->update(['name' => $request->name, 'gender' => $request->gender]);

        return redirect()->route('viewProfilePage', $user)->with('success', 'Successfully updated user in database.');
    }
    public function cpPage(){
        return view('changepassword');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $currentPass = auth()->user()->password;
        $old_pass = request('old_password');

        if(Hash::check($old_pass, $currentPass)){
            auth()->user()->update([
                'password' => bcrypt(request('password')),
            ]);

            return back()->with('success', "Your password has been changed successfully.");
        }else{
            return back()->withErrors(['old_password' => 'Make sure you fill your current password correctly!']);
        }
    }

    public function delete(User $user){
        // dd($task);
        DB::table('users')->where('id' , '=', $user->id)->delete();

        return redirect()->back();
    }

    public function promote(User $user){
        // dd($task);

        DB::table('users')->where('id' , '=', $user->id)->update(['is_admin' => 1]);

        $tc = DB::table('tasks_cart')->where('user_id', '=', $user->id)->first();
        DB::table('tasks')->where('cart_id', '=', $tc->id)->delete();

        return redirect()->back();
    }

    public function demote(User $user){
        // dd($task);

        DB::table('users')->where('id' , '=', $user->id)->update(['is_admin' => 0]);

        return redirect()->back();
    }

}
