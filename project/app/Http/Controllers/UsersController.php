<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Response;
use App\Admin;
use App\UsersDetail;
use App\Hobby;
use App\Country;
use App\Language;


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

    public function signin(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->input();

            if (Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>null])) {


                Session::put('frontSession', $data['email']);
                return redirect('/phase/2');
                //echo "success";
               // die;
            } else {
                //echo "failed";
                //die;
                return redirect::back()->with('flash_message_error', 'Invalid Username or Password');
            }
        }

    }

    public function phase2(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $userDetail  = new UsersDetail;
            $userDetail->user_id = Auth::User()['id'];
            $userDetail->dob = $data['dob'];
            $userDetail->gender = $data['gender'];
            $userDetail->height = $data['height'];
            $userDetail->marital_status = $data['maritial_status'];
            $userDetail->save();
        }
        $countries = Country::get();

        $languages  =Language::orderBy('name', 'ASC')->get();

        $hobbies = Hobby::orderBy('title', 'ASC')->get();

        return view('users.phase2')->with(compact('countries', 'languages', 'hobbies'));
    }

    public function logout(){
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('current_url');
        return redirect()->action('FrontController@front');
    }

}
