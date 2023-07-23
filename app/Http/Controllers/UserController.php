<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Session;

class UserController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:steve_tech_user_models',
            'password' => 'required|min:4|max:10',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();

        if ($res) {
            return back()->with('success', 'You have registered successfully');
        } else {
            return back()->with('fail', 'Something went wrong, please try again');
        }
    }

    public function myroute()
    {
        //$data = array();
        if (Session::has('loginId')) {
            $user = User::where('id', Session::get('loginId'))->first();
        }

        $data = Issue::all();
        //dd($data);
        return view('myroute', compact('data', 'user'));
    }

    public function logout(){
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }

}
