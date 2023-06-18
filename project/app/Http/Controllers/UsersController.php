<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function signup(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            if(Auth::attempt(['name'=>$data['name'],'password'=>$data['password'],'admin'=>'0'])) {
                Session::put('frontSession', $data['name']);
                return redirect('/phase/2');
            }
        }
        return view('users.register');
    }

    public function checkUsername(Request $request)
    {
        $data=$request->all();
        $usersCount=User::where('username', $data['username'])->count();
        if($usersCount>0) {
            echo 'false';
        } else {
            echo 'true';
        }
    }

    public function checkEmail(Request $request)
    {
        $data=$request->all();
        $usersCount=User::where('email', $data['email'])->count();
        if($usersCount>0) {
            echo 'false';
        } else {
            echo 'true';
        }

    }
}
