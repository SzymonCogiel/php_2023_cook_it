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

    //    public function checkUsername(Request $request)
    //    {
    //        $data = $request->all();
    //        $usersCount = User::where('username', $data['username'])->count();
    //        if ($usersCount > 0) {
    //            echo 'false';
    //        } else {
    //            echo 'true';
    //        }
    //    }

    //    public function checkEmail(Request $request)
    //    {
    //        $data = $request->all();
    //        $usersCount = User::where('email', $data['email'])->count();
    //        if ($usersCount > 0) {
    //            echo 'false';
    //        } else {
    //            echo 'true';
    //        }
    //
    //    }
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
    //    public function signin(Request $request){
    //        if($request->isMethod('post')){
    //            $data = $request->input();
    //            echo"<pre>"; print_r($data);
    //    }
    //    }
    //    public function signin(Request $request)
    //    {
    //        if ($request->isMethod('post')) {
    //            $data = $request->input();
    //
    //            if (Auth::attempt(['username' => $data['username'], 'password' => $data['password']])) {
    //                echo "XD";
    //                if (preg_match("/contact/i", session('current_url'))) {
    //                    session()->put('frontSession', $data['username']);
    //                    return redirect(session('current_url'));
    //                } else {
    //                    session()->put('frontSession', $data['username']);
    //                    return redirect('/phase/2');
    //                }
    //            } else {
    //                return redirect()->back()->with('flash_message_error', 'Invalid Username or Password');
    //            }
    //        }
    //    }
    public function phase2(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $userDetail = new UserDetail();
            $userDetail->user_id = Auth::user()['id'];
            $userDetail->skills = $data['skills'];
            $userDetail->city = $data['city'];
            $userDetail->cost = $data['cost'];
            $userDetail->travel = $data['travel'];
            $userDetail->alergie = $data['alergie'];
            $userDetail->points = 0;
            $userDetail->save();
            return redirect('phase/3');
        }

        return view('users.phase2');
    }
    //    public function phase2(Request $request)
    //    {
    //        $userFormCount = UserDetail::where('user_id', Auth::user()->getAuthIdentifier())
    //            ->where('status', 0)
    //            ->count();
    //            if($userFormCount>0) {
    //                return redirect('/inreview');
    //            }
    //
    //        if ($request->isMethod('post')) {
    //            $data = $request->all();
    //
    //            //echo "<pre>"; print_r($data); die;
    //            // //linijka która tylko pokazuje czy się dobrze zapisuje, można usunąć, przydatna przy front
    //
    //            if (empty($data['user_id'])) {
    //                $userDetail = new UserDetail();
    //                $userDetail->user_id = Auth::User()['id'];
    //
    //            } else {
    //                $userDetail = UserDetail::where('user_id', $data['user_id'])->firts();
    //                $userDetail->status = 0;
    //            }
    //            $userDetail->username = Session::get('frontSession');
    //            $userDetail->user_id = Auth::User()['id'];
    //            $userDetail->dob = $data['dob'];
    //            $userDetail->gender = $data['gender'];
    //            $userDetail->height = $data['height'];
    //            $userDetail->marital_status = $data['maritial_status'];
    //            //$userDetail->save();
    //            if (empty($data['body_type'])) {
    //
    //                $data['body_type'] = '';
    //            }
    //
    //            if (empty($data['city'])) {
    //
    //                $data['city'] = '';
    //            }
    //
    //            if (empty($data['state'])) {
    //
    //                $data['state'] = '';
    //            }
    //
    //            if (empty($data['country'])) {
    //
    //                $data['country'] = '';
    //            }
    //
    //
    //            if (empty($data['education'])) {
    //
    //                $data['education'] = '';
    //            }
    //
    //
    //            if (empty($data['occupation'])) {
    //
    //                $data['occupation'] = '';
    //            }
    //
    //
    //            if (empty($data['income'])) {
    //                $data['income'] = '';
    //            }
    //
    //
    //            if (empty($data['complexion'])) {
    //                $data['complexion'] = '';
    //            }
    //
    //            $userDetail->body_type = $data['body_type'];
    //            $userDetail->complexion = $data['complexion'];
    //            $userDetail->city = $data['city'];
    //            $userDetail->state = $data['state'];
    //            $userDetail->country = $data['country'];
    //            $userDetail->languages = $data['languages'];
    //
    //            $userDetail->education = $data['education'];
    //            $userDetail->occupation = $data['occupation'];
    //            $userDetail->income = $data['income'];
    //            $userDetail->about_myself = $data['about_myself'];
    //            $userDetail->about_partner = $data['about_partner'];
    //
    //            $hobbies = "";
    //            if (!empty($data['hobbies'])) {
    //                foreach ($data['hobbies'] as $hobby) {
    //                    $hobbies .= $hobby . ', ';
    //                }
    //            }
    //
    //            $userDetail->hobbies = $hobbies;
    //
    //
    //            $languages = "";
    //            if (!empty($data['languages'])) {
    //                foreach ($data['languages'] as $language) {
    //                    $languages .= $language . ', ';
    //                }
    //            }
    //            $userDetail->languages = $languages;
    //            $userDetail->save();
    //        }
    //
    //
    //        // Get all Countries
    //
    //        $countries = Country::get();
    //
    //        // Get all languages
    //
    //
    //        $languages = Language::orderBy('name', 'ASC')->get();
    //
    //
    //        // Get all Hobbies
    //
    //
    //        $hobbies = Hobby::orderBy('title', 'ASC')->get();
    //
    //        return view('users.phase2')->with(compact('countries', 'languages', 'hobbies'));
    //    }

    public function logout()
    {
        Auth::logout();
        Session::forget('frontSession');
        Session::forget('current_url');
        return redirect()->action([FrontController::class, 'front']);
    }


    public function inreview()
    {
        $user_id = Auth::User()['id'];
        $userStatus = UserDetail::select('status')->where('user_id', $user_id)->first();
        if($userStatus->status == 1) {
            return redirect('/phase2');
        } else {
            return view('users.inreview');
        }
        return view('users.inreview');
    }

    public function viewUsers()
    {

        $users = User::with('details')->with('photos')->get();

        $users = json_decode(json_encode($users), true);

        //echo "<pre>"; print_r($users); die;

        return view('admin.users.view_users') -> with(compact('users'));
    }

    public function updateUserStatus(Request $request)
    {
        $data = $request->all();
        UserDetail::where('user_id', $data['user_id'])->update(['status'=>
    $data['status']]);
    }

    public function phase3(Request $request)
    {
        $user_id = Auth::User()['id'];
        $user_photos = UsersPhoto::where('user_id', $user_id)->get();
        return view('users.phase3')->with(compact('user_photos'));
    }

    public function postphoto(Request $request)
    {

        if($request->isMethod('post')) {

            $data = $request->all();

            $formInput=$request->except('image');

            $image=$request->image;
            if($image) {

                $imageName=$image->getClientOriginalName();

                $image->move('images', $imageName);

                $formInput['image']=$imageName;

                $formInput['username']=Session::get('frontSession');

            }

            UsersPhoto::create($formInput);

            $user_id = Auth::User()['id'];
            $user_photos = UsersPhoto::where('user_id', $user_id)->get();

            // return redirect('/phase/3')->with('flash_message_success',
            //'Your photo(s) has been uploaded successfully.');

            return view('users.phase3')->with(compact('user_photos'));

        }
    }

    public function deletePhoto($photo)
    {
        $user_id = Auth::User()->id;
        UsersPhoto::where(['user_id'=>$user_id,'image'=>$photo])->delete();
        return redirect()->back()->with('flash_message_success', 'Photo has been deleted successfully!');
    }

    public function updatePhotoStatus(Request $request)
    {
        $data = $request->all();
        UsersPhoto::where('id', $data['photo_id'])->update(['status'=>$data['status']]);
    }

    public function viewProfile($username)
    {

        $userDetails = User::with('details')->with('photos')->where(
            'username',
            $username
        )->first();
        $userDetails = json_decode(json_encode($userDetails));
        // echo "<pre>"; print_r($userDetails); die;
        return view('users.profile')->with(compact('userDetails'));
    }

    public function defaultPhoto($photo)
    {
        $user_id = Auth::User()->id;
        UsersPhoto::where('user_id', $user_id)->update(['default_image'=>'No']);
        UsersPhoto::where(['user_id'=>$user_id,'image'=>$photo])->update(['default_image'=>'Yes']);
        return redirect()->back()->with('flash_message_success', 'Default Picture has been placed successfully');
    }

    public function searchProfile(Request $request)
    {
        if($request->isMethod('post')) {
            $data = $request->all();
            $searched_users = User::with('details')->with('photos')
                ->join('users_details', 'users_details.user_id', '=', 'users.id')

                ->where('users_details.gender', $data['gender'])
                ->where('users_details.country', $data['country'])
                ->orderBy('users.id', 'Desc')->get();

            $searched_users = json_decode(json_encode($searched_users));
            $minimumyears = $data['minimumyears'];
            $maximumyears = $data['maximumyears'];

            return view('users.search')->with(compact(
                'searched_users',
                'minimumyears',
                'maximumyears'
            ));
        }
    }

    public function contactUser(Request $request, $username)
    {
        $userCount = User::where('username', $username)->count();

        if($userCount > 0) {
            $userDetails = User::with('details')->with('photos')->where(
                'username',
                $username
            )->first();
            $userDetails = json_decode(json_encode($userDetails));

            if($request->isMethod('post')) {
                $data = $request->all();
                echo "Person who sent message";

                echo Auth::user()->username;
                echo "--";
                echo Auth::user()->id;
                echo "<br>";

                echo "Person who received the message";
                echo $username;
                echo "--";

                echo $userDetails->id;

                $reply=new Reply();
                $reply->sender_id=Auth::user()->id;
                $reply->receiver_id=$userDetails->id;
                $reply->message=$data['message'];
                $reply->save();
                return redirect()->back()->with('flash_message_success', 'Your response has been sent to this person');
            }
        } else {
            abort(404);
        }

        if($request->isMethod('post')) {
            $data = $request->all();
            echo "<pre>";
            print_r($data);
            die;
        }

        return view('user.contact')->with(compact('userDetails'));
    }
    public function replies()
    {
        $receiver_id=Auth::user()->id;
        $replies=Reply::where('receiver_id', $receiver_id)->orderBy('id', 'Desc')->get();

        //$replies=json_decode(json_encode($replies));

        //echo "<pre>";
        //print_r($replies);
        //die;
        return view('users.replies')->with(compact('replies'));
    }

    public function shootedMessages()
    {
        $sender_id=Auth::user()->id;

        $shooted_messages=Reply::where('sender_id', $sender_id)->orderBy('id', 'Desc')->get();
        $shooted_messages=json_decode(json_encode($shooted_messages));
        //echo "<pre>";
        //print_r($shooted_messages);
        //die;
        return view('users.shooted_messages')->with(compact('shooted_messages'));
    }

    public function deleteReply($id)
    {
        Reply::where('id', $id)->delete();

        return redirect()->back()->with('flash_message_success', 'Reply has been deleted successfully');
    }

    public function updateReply(Request $request)
    {
        if($request->isMethod('post')) {
            $data=$request->all();
            //echo "<pre>"; print_r($data); die;

            Reply::where('id', $data['reply_id'])->update(['viewed'=>1]);
        }
    }


    //    public function login()
    //    {
    //        return view('users.login');
    //    }
    public function __construct()
    {
        $this->middleware('auth')->only('profile');
    }
    public function profile()
    {

        $userDetail = UserDetail::where('user_id', Auth::id())->first();
        $userDetailUsername=User::where('id', Auth::id())->first();

        $challangeHistory=Challenge::where('Challanger',$userDetailUsername->username);
        $challangeAuthor=Challenge::where('Author',"".Auth::id());

        return view('users.profile', ['userDetail' => $userDetail,'users' => $userDetailUsername, 'challangeHistory' => $challangeHistory, 'challangeAuthor' => $challangeAuthor]);
    }



    public function search()
    {
        $challenges = Challenge::with('author.details')->get();

        return view('users.search', compact('challenges'));
    }


}
