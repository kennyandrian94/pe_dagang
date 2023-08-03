<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

use App\Models\Admin;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('back.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
            
        if (Auth::guard('admin')->attempt($request->only('email', 'password'), $request->remember))
        {
            return redirect()->route('admin.dashboard');
        }
        else 
        {
            return redirect()->route('admin.login')->withErrors('These credentials do not match our records.');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}
