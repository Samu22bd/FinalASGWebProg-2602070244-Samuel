@extends('layouts/master') 

@section('title', __('avatar.title_request')) 

@section('content')

<div>
    <div>@lang('friend.requests')</div>
    @foreach ($request as $r)
        <div>{{$r->user->name}}</div>
        <form action="{{ route('wish.add', ['id'=>$r->user->id]) }}" method="POST">
            @csrf
            <button>@lang('friend.btn_likeBack')</button>
        </form>
    @endforeach
</div>

@endsection