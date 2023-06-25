<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;




class ChallengeController extends Controller
{


    public function indexChallange()
    {

        if (!Auth::check()){
            return redirect('/');
        }
        return view('challenge');
    }

    public function sendChallange(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'Dish' => 'required',
            'Price' => 'required',
            'Ingredients' => 'required',
            'Allergens' => 'required',
            'Level' => 'required',
            'Note' => 'required',
            'Challenger' => '',
            'Photo' => '',
            'Status' => '',
            'Review' => '',
            'StartDate' => '',
            'FinalDate' => '',
        ]);

        // Get the authenticated user's ID as the sender ID
        $authorId = Auth::id();
        $validatedData['Author'] = $authorId;
        $validatedData['Challenger'] = 0;
        $validatedData['Photo'] = 0;
        $validatedData['Status'] = 0;
        $validatedData['Review'] = 0;
        $validatedData['StartDate'] = 0;
        $validatedData['FinalDate'] = 0;
       // echo "<pre>"; print_r($validatedData); die;
        // Create a new challenge
       Challenge::create($validatedData);

       return redirect('/challenge')->with('success', 'Challenge sent successfully.');
    }



}
