<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminsController extends Controller
{
    // view login
    public function viewLogin()
    {
        return view('admins.login');
    }

    // check login
    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'Email or password is incorrect']);
    }

    public function index()
    {
        return view('admins.index');
    }
}
