<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\Hobby;
use App\Models\Message;
use App\Models\MessageRecepient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(){
        $users = User::where('id', '!=', auth()->id())
        ->where('is_visible', '=', 1)
        ->paginate(10);
        $hobbies = Hobby::get();

        if(Auth::user()){
            $userID = Auth::user()->id;
            $messages = MessageRecepient::where('receiver_id', '=', $userID)
            ->where('is_read', '=', 0)->get();

            $requests = Friend::where('friend_id', '=', $userID)
            ->where('accepted', '=', 0)->get();
            return view('pages/home', ['userList' => $users, 'hobbyList' => $hobbies, 'message' => $messages,
            'friendReq' => $requests]);
        }

        return view('pages/home', ['userList' => $users, 'hobbyList' => $hobbies, 'message' => null,
        'friendReq' => null]);
    }

    public function profile(){
        $user = Auth::user();
        $userID = $user->id;
        $friends = Friend::where(function($query) use ($userID) {
            $query->where('user_id', $userID)
                  ->orWhere('friend_id', $userID);
        })
        ->where('accepted', 1)
        ->get();

        return view('user/profile', ['user' => $user, 'friends' => $friends]);
    }

    public function setting(){
        return view('user/settings');
    }

    public function visible(){
        $user = Auth::user();
        $user->coins -= 5;
        $user->is_visible = 1;
        $user->save();
        return redirect()->route('user.profile');
    }

    public function invisible(){
        $user = Auth::user();
        $user->coins -= 50;
        $user->is_visible = 0;
        $user->save();
        return redirect()->route('user.profile');
    }

    public function search(Request $request){
        
        // dd($request->gender);
        // dd($request->hobbies);

        $allUser = User::where('id', '!=', auth()->id());
        if($request->gender){
            $allUser
            ->where('gender', $request->gender)
            ->paginate(10);
        }

        if($request->hobbies){
            $hobbies = $request->hobbies;
            $allUser->whereHas('hobbies', function ($query) use ($hobbies) {
                $query->where('hobby_id', '=', $hobbies);
            });
        }

        $users = $allUser->paginate(10);
        $hobbies = Hobby::get();

        return view('pages/home', ['userList' => $users, 'hobbyList' => $hobbies, 'message' => null,
        'friendReq' => null]);
    }

    public function showCoin(){
        $user = Auth::user();
        return view('user/my-coin', ['user' => $user]);
    }

    public function addCoin(){
        $user = Auth::user();
        $user->coins += 100;
        $user->save();        
        return view('user/my-coin', ['user' => $user]);
    }

    public function showRegister(){
        $hobbies = Hobby::get();
        return view('guest/register', ['hobbyList' => $hobbies]);
    }

    public function register(Request $request){
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'gender' => 'required',
            'instagram_username' => 'required|unique:users|regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9._]+$/',
            'hobbies' => 'required|array|min:3',
            'password' => 'required',
            'mobile_number' => 'required|digits_between:10,15',
            'birth_date' => 'required',
        ]);

        // dd($request->email);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'gender' => $request->gender,
            'instagram_username' => $request->instagram_username,
            'password' => Hash::make($request->password),
            'coins' => 100,
            'mobile_number' => $request->mobile_number,
            'birth_date' => $request->birth_date,
        ]);

        $hobbyList = $request->hobbies;
        foreach ($hobbyList as $h) {
            $user->hobbies()->attach($h);
        }

        Auth::login($user);
        
        return redirect()->route('payment.show', ['price' => $request->input('registration_price')]);
    }

}
