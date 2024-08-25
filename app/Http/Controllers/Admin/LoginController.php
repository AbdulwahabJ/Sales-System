<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show_login_view()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        // dd($request);
        if (auth()->guard('admin')
            ->attempt([
                'name' => $request->input('name'),
                'password' => $request->input('password')
            ])
        ) {
            return redirect()->route('admin.dashboard');
        } else {
            echo 'cant login now try after few minutes';
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.loginform');
    }
}

// public function createUser()
// {
//     $admin = new Admin();
//     $admin->name = 'admin';
//     $admin->email='admin@gmail.com';
//     $admin->username='admin';
//     $admin->password=bcrypt('admin');
//     $admin->com_code=1;
//     $admin->save();
// }
