<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ChatController extends Controller
{


    public function index()
    {

        if (!Auth::check()){
            return redirect('/');
        }
        // Fetch all messages
        $messages = Message::all();



        return view('chat', compact('messages'));
    }

    public function sendMessage(Request $request)
    {


            // Validate the request data
            $validatedData = $request->validate([
                'receiver' => 'required',
                'message' => 'required',
            ]);

            // Get the authenticated user's ID as the sender ID
            $senderId = User::getUsernameofuser(Auth::id());
            $validatedData['sender'] = $senderId;

            // Create a new message


            if (DB::table('users')->where('username', $validatedData['receiver'])->exists()) {
                Message::create($validatedData);
                return redirect('/message')->with('success', 'Message sent successfully.');
            }else {
                return redirect()->back()->withErrors(['error' => 'Invalid username or password']);
            }

    }

    public function showReceivedMessages()
    {

        // Pobierz wiadomości wysłane do zalogowanego użytkownika$receivedMessages = Message::where('receiver', User::getUsernameofuser(Auth::id())->get());
        $receivedMessages = DB::table('messages')->where('receiver', User::getUsernameofuser(Auth::id()))->get();

        //echo "<pre>"; print_r($receivedMessages); die;
        return view('received-messages', ['receivedMessages' => $receivedMessages]);
    }


}
