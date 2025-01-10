<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageRecepient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $user = Auth::user();
        $userID = $user->id;
        $friend = User::findOrFail($id);

        $messages = Message::where(function($query) use ($userID, $id) {
            $query->where('sender_id', $userID)
                  ->whereHas('recipients', function($q) use ($id) {
                      $q->where('receiver_id', $id);
                  });
        })->orWhere(function($query) use ($userID, $id) {
            $query->where('sender_id', $id)
                  ->whereHas('recipients', function($q) use ($userID) {
                      $q->where('receiver_id', $userID);
                  });
        })->orderBy('created_at', 'asc')->get();

        MessageRecepient::whereIn('message_id', $messages->pluck('id'))
        ->where('receiver_id', $userID)
        ->update(['is_read' => 1]);

        $avatars = $user->avatars()->get();

        return view('message/index', ['user' => $user, 'friend' => $friend, 'messages' => $messages,
        'avatarList' => $avatars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $sender_id = Auth::user()->id;

        $message = Message::create([
            'sender_id' => $sender_id,
            'content' => $request->content,
            'avatar_id' => $request->avatar_id,
        ]);

        // dd($message->avatar_id);

        MessageRecepient::create([
            'message_id' => $message->id,
            'receiver_id'=> $request->id,
            'is_read' => 0,
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
