@extends('layouts/master') 

@section('title', __('avatar.title_wishlist')) 

@section('content')

<div>
    <div>@lang('friend.wishlists')</div>
    @foreach ($wishlist as $w)
        <div>{{$w->friend->name}}</div>
    @endforeach
</div>

@endsection