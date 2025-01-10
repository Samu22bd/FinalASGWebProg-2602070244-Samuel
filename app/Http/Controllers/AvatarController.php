<?php

namespace App\Http\Controllers;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $avatars = Avatar::get();
        return view('avatar/index', ['avatarList' => $avatars]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('avatar/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'avatar' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        if($request->file('avatar')){
            $avatar = $request->file('avatar');
            $extension = $avatar->extension();
            $fileName = $request->name. '.' .$extension;
            $filepath = 'avatars/' .$fileName;
            $avatar->move(public_path('avatars'), $fileName);
        }

        $avatar = Avatar::create([
            'name' => $request->name,
            'price' => $request->price,
            'file_path' => $filepath,
        ]);

        $user = Auth::user();
        $user->avatars()->attach($avatar->id);

        return redirect()->route('avatar.index');
    }

    public function buy($id){
        $user = Auth::user();
        $avatar = Avatar::findOrFail($id);

        $user->avatars()->attach($id);

        $user->coins -= $avatar->price;
        $user->save();
        return redirect()->route('user.profile');
    }

    public function showAvatars(){
        $avatars = Auth::user()->avatars()->get();

        return view('user/my-avatar', ['avatarList' => $avatars]);
    }

    public function set($id){
        $user = Auth::user();
        $user->avatar_id = $id;
        $user->save();

        return redirect()->route('user.profile');
    }

    public function receive($id){
        $user = Auth::user();

        Avatar::find($id)->user()->detach();
        $user->avatars()->attach($id);

        return redirect()->route('user.avatar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
