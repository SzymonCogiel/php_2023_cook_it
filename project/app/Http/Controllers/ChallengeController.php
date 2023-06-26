<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Challenge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ChallengeController extends Controller
{
    public function indexChallange()
    {

        if (!Auth::check()) {
            return redirect('/');
        }

        $userDetailUsername=User::where('id', Auth::id())->first();
        $challangeAuthor=Challenge::where('Author', $userDetailUsername->username)->get();
        return view('challenge', ['challangeAuthor' => $challangeAuthor]);
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

        ]);

        // Get the authenticated user's ID as the sender ID
        $authorId = User::getUsernameofuser(Auth::id());
        $validatedData['Author'] = $authorId;
        $validatedData['Challenger'] = '';
        $validatedData['Photo'] = '';
        $validatedData['Status'] = '';
        $validatedData['Review'] = '';

        // echo "<pre>"; print_r($validatedData); die;
        // Create a new challenge
        Challenge::create($validatedData);

        return redirect('/challenge')->with('success', 'Challenge sent successfully.');
    }



    public function search()
    {
        $challenges = DB::table('challenges')
            ->where('author', '!=', User::getUsernameofuser(Auth::id()))
            ->where('challenger', 0)
            ->get();
        return view('users.search', compact('challenges'));
    }

    public function sendID(Request $request)
    {
        $challengeId = $request->input('id');

        Challenge::where('id', $challengeId)->update(['Challenger'=>User::getUsernameofuser(Auth::id())]);
        Challenge::where('id', $challengeId)->update(['Status'=>'In progress']);
        $data = Carbon::now();
        Challenge::where('id', $challengeId)->update(['StartDate'=>$data]);
        $data->addDay(7);
        Challenge::where('id', $challengeId)->update(['FinalDate'=>$data]);
        //update(['Challenger'=>User::getUsernameofuser(Auth::id())]);

        return redirect('/search');
    }

    public function sendReview(Request $request)
    {
        $challengeReview = $request->all();
        $image = base64_encode($request['image']);
        $img =  $request->file('image');
        //echo "<pre>"; echo $img; die;
        $imagePath = $img->store('/img');
        if ($img) {

        }else
        {
            $imagePath='';
        }
        Challenge::where('id', $challengeReview['id'])->update(['Status'=>$challengeReview['Status'], 'Review'=>$challengeReview['Review'], 'Photo'=>$imagePath]);

        return redirect('/challenge');
    }

}
