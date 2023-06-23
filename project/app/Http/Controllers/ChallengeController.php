<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChallengeController extends Controller
{
    public function search()
    {
        $challenges = Challenge::with('author.details')->get();
        return view('users.search', compact('challenges'));
    }

    public function challenge()
    {
        return view('users.challange');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Author' => 'required',
            'Dish' => 'required',
            'Price' => 'required',
            'Ingredients' => 'required',
            'Allergens' => 'required',
            'Level' => 'required',
            'Note' => 'required',
            'Challenger' => 'required',
            'Photo' => 'nullable',
            'Status' => 'nullable',
            'Review' => 'nullable',
            'StartDate' => 'nullable',
            'FinalDate' => 'nullable',


        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Challenge::challenge($request->all());

        return redirect()->route('challenges.search')->with('success', 'Challenge created successfully.');
    }


}
