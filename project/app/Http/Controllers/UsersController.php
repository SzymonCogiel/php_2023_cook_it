<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Reply;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\Response;
use App\Models\Admin;
use App\Models\UserDetail;
use App\Models\UsersPhoto;
use App\Models\Hobby;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Support\Facades\Validator;
use Nette\Utils\Image;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function signup(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])/',
            ]);

            if ($validator->fails()) {
                return redirect('/signup')
                    ->withErrors($validator)
                    ->withInput();
            }


            $user = new User();
            $user->name = $data['name'];
            $user->username = $data['username'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();

            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
                Session::put('frontSession', $data['username']);

                return redirect('/phase/2');
            }
        }
        return view('users.register');
    }


    public function signin(Request $request)
    {
        if (Auth::check()) {
            return redirect('/profile');
        }
        if ($request->isMethod('post')) {
            $data = $request->input();
            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $credentials = [
                'username' => $data['username'],
                'password' => $data['password'],
            ];

            if (Auth::attempt($credentials)) {
                return redirect('profile');
            } else {
                return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
            }

        }

        return view('users.login');
    }

    public function phase2(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->validate([
                'skills' => 'required',
                'city' => 'required|not_in:0',
                'cost' => 'required',
                'travel' => 'required',
                'alergie' => '',
            ]);

            $userDetail = new UserDetail();
            $userDetail->user_id = Auth::user()['id'];
            $userDetail->skills = $data['skills'];
            $userDetail->city = $data['city'];
            $userDetail->cost = $data['cost'];
            $userDetail->travel = $data['travel'];
            $userDetail->alergie = $data['alergie'];
            $userDetail->points = 0;
            $userDetail->photo = '';
            $userDetail->save();
            //return redirect('phase/3');
            return view('users.phase3');
        }

        return view('users.phase2');
    }


    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('current_url');
        return redirect()->action([FrontController::class, 'front']);
    }


//    public function phase3(Request $request)
//    {
//        $user_id = Auth::User()['id'];
//        $user_photos = UsersPhoto::where('user_id', $user_id)->get();
//        return view('users.phase3')->with(compact('user_photos'));
//    }

    public function __construct()
    {
        $this->middleware('auth')->only('profile');
    }
    public function profile()
    {

        $userDetail = UserDetail::where('user_id', Auth::id())->first();
        $userDetailUsername=User::where('id', Auth::id())->first();


        $challangeHistory=Challenge::where('Challenger', $userDetailUsername->username)->get();
        $challangeAuthor=Challenge::where('Author', $userDetailUsername->username)->get();

        //$challenge = DB::table('challenges')->where('id', $challengeId)->first();
        //echo  $challangeAuthor[0]->Photo ; die;

        return view('users.profile', ['userDetail' => $userDetail,'users' => $userDetailUsername, 'challangeHistory' => $challangeHistory, 'challangeAuthor' => $challangeAuthor]);
    }



    public function search()
    {
        $challenges = Challenge::with('author.details')->get();

        return view('users.search', compact('challenges'));
    }
    public function sendPhoto(Request $request)
    {
        $request->validate([
            'photo' => 'nullable|image',
        ]);
        if ($request->has('photo')) {


            $path = $request->file('photo')->store('public/photos');
//
            $userDetail = new UserDetail();
            $userDetail->id = Auth::user()->id;
            $userDetail->photo = $path;
            //echo  $path; die;
            $newPath = substr($path, 6);
            //echo  Auth::user()->id; die;
            $userDetail->update();
            UserDetail::where('user_id', Auth::user()->id)->update(['photo' => $newPath]);


            return redirect('/profile')->with('success', 'Zdjęcie zostało dodane.');
        }else
        {
            $path ='app/public/photos/avatar.jpg';

            $userDetail = new UserDetail();
            $userDetail->id = Auth::user()->id;
            $userDetail->photo = $path;
            //echo  $path; die;
            $newPath = substr($path, 4);
            //echo  Auth::user()->id; die;
            $userDetail->update();
            UserDetail::where('user_id', Auth::user()->id)->update(['photo' => $newPath]);
            return redirect('/profile')->with('success', 'Zostało dodane domyślne zdjęcie.');

        }
    }
}
