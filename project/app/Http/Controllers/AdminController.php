<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if($request->isMethod('post')) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password,'admin'=>'1'])) {
                return redirect('admin/dashboard');

            } else {
                return redirect('/admin')->with('flash_massage_error', 'Invalid Username or Password');
            }
        }
        return view('admin.adminsign');
    }

    public function dashboard()
    {
        return view('admin.dashboard');

    }
}
