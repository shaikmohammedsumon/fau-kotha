<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index(){
        return view('dashboard.profile.index');
    }


    public function name(Request $request){

        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
        ]);

        if(Hash::check($request->password,Auth::user()->password)){
            User::find(auth()->user()->id)->update([
                'name' => $request->name,
                'update_at' => now(),
            ]);
            return back()->with('name',"name Update Successful");
        }else{
            return back()->withErrors(['error_pass' => "Old Password dous't match"])->withInput();
        }
    }



    public function password(Request $request){
        $request->validate([
            'current_password' => 'required|min:8',
            'password'=>'required|min:8|confirmed',
        ]);

        if(Hash::check($request->current_password,Auth::user()->password)){
            User::find(auth()->user()->id)->update([
                'password' => $request->password,
                'update_at' => now(),
            ]);
            return back()->with('name',"password Update Successful");
        }else{
            return back()->withErrors(['old_pass' => "Old Password dous't match"])->withInput();
        }

    }



}
