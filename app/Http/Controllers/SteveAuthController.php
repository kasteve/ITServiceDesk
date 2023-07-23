<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SteveTechUserModel;
use App\Models\Issue;
use Illuminate\Support\Facades\Hash;
use Session;

class SteveAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function registration()
    {
        return view("auth.registration");
    }
    public function suggestions()
    {
        return view("suggestions");
    }
    public function sla()
    {
        return view("sla");
    }
    public function reminders()
    {
        return view('reminders');
    }

    public function registerUser(Request $request)
    {
        
         $this->validate($request, [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
    ]);

    $user = new SteveTechUserModel();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->back()->with('success', 'User registered successfully.');

    }

    public function loginUser(Request $request)
    {
        $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = SteveTechUserModel::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Session::put('loginId', $user->id);
        return redirect()->route('myroute')->with('success', 'Login successful.');
    } else {
        return redirect()->back()->with('fail', 'Invalid email or password.');
    }

    }

    public function myroute()
    {
        if (Session::has('loginId')) {
            $user = SteveTechUserModel::where('id', Session::get('loginId'))->first();
        }

        $data = Issue::all();
        $newCount = $data->where('status', 'new')->count();
        $assignedCount = $data->where('status', 'assigned')->count();
        $pendingCount = $data->where('status', 'pending')->count();
        $closedCount = $data->where('status', 'closed')->count();
        $resolvedCount = $data->where('status', 'resolved')->count();

        return view('myroute', compact('data', 'user', 'newCount', 'assignedCount', 'pendingCount', 'closedCount', 'resolvedCount'));
    }

    public function detailed_report()
    {
        if (Session::has('loginId')) {
            $user = SteveTechUserModel::where('id', Session::get('loginId'))->first();
        }

        $data = Issue::all();
        $newCount = $data->where('status', 'new')->count();
        $assignedCount = $data->where('status', 'assigned')->count();
        $pendingCount = $data->where('status', 'pending')->count();
        $closedCount = $data->where('status', 'closed')->count();
        $resolvedCount = $data->where('status', 'resolved')->count();

        return view('detailed_report', compact('data', 'user', 'newCount', 'assignedCount', 'pendingCount', 'closedCount', 'resolvedCount'));
    }

    public function logout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}

