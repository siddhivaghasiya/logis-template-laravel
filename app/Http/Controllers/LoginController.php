<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function create()
    {

        if (\Auth::check()) {

            return redirect()->route('admin');
        }

        return view('admin.auth.login');
    }

    public function postlogin(Request $request)
    {

        $request->validate([

            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin');
        } else {


            return redirect()->route('login');
        }
    }

    public function logout()
    {

        \Auth::logout();

        return redirect()->route('login');
    }
}
