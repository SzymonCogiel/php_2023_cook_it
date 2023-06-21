<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class FrontController extends Controller
{
    //
    public function front(){

//        $fresh_users = User::with('details')->with('photos')->orderBy('id','Desc')->get();
//        $fresh_users = json_decode(json_encode($fresh_users));
//
//        // echo "<pre>"; print_r($fresh_users); die;
//        return view('front')->with(compact('fresh_users'));
        return view('front');
    }
}
