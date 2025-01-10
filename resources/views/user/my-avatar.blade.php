@extends('layouts/master') 

@section('title', __('user.title_myAvatar')) 

@section('content')

<div class="row">
    <div class="col-12">
        {{-- {{$avatarList}} --}}
        @foreach ($avatarList as $a)
        <div>
            <img src="{{ asset($a->file_path) }}" class="img-fluid w-50 h-50" alt="">
            <div>{{$a->name}}</div>
            <a href="{{ route('avatar.set', ['id'=>$a->id]) }}">
                <button>@lang('user.btn_setAvatar')</button>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection
