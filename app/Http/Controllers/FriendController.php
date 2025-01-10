<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    //
    public function showWishlist(){
        $userID = Auth::user()->id;
        $friends = Friend::where(function($query) use ($userID) {
            $query->where('user_id', $userID);
        })
        ->where('accepted', 0)
        ->get();

        return view('friend/wishlist', ['wishlist' => $friends]);
    }

    public function showRequest(){
        $userID = Auth::user()->id;
        $friends = Friend::where(function($query) use ($userID) {
            $query->where('friend_id', $userID);
        })
        ->where('accepted', 0)
        ->get();

        return view('friend/request', ['request' => $friends]);
    }

    public function addWishlist(Request $request){
        $userID = Auth::user()->id;
        $friendID = $request->id;

        
        $isWish = Friend::where(function($query) use ($userID, $friendID) {
            $query->where('user_id', $userID)
                  ->where('friend_id', $friendID);
        })->first();

        $isRequested = Friend::where(function($query) use ($userID, $friendID) {
            $query->where('user_id', $friendID)
                  ->where('friend_id', $userID);
        })->first();

        if($isWish && $isWish->accepted == 1){
            return redirect()->route('user.profile')->with('message', 'already friend');
        }else if($isWish && $isWish->accepted = 0){
            return redirect()->route('user.profile')->with('message', 'already send friend request');
        }else if($isRequested){
            $isRequested->accepted = 1;
            $isRequested->save();
            return redirect()->route('user.profile')->with('message','You are now friends');
        }else{
            Friend::create([
                'user_id' => $userID,
                'friend_id' => $friendID,
            ]);
            return redirect()->route('user.profile')->with('message', 'friend request sent');
        }
    }
}
