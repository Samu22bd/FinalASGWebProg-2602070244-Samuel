@extends('layouts/master') 

@section('title', __('message.title_message')) 

@section('content')

<div>
    <div>{{$friend->name}}</div>
    <div>
        <div>
            @lang('message.title1')
        </div>
        @foreach ($messages as $m)
        {{-- <div>{{ $m }}</div> --}}
            @if ( $m->sender_id == $user->id )
                @if( $m->avatar_id )
                    <img src="{{ asset($m->avatar->file_path) }}" class="img-fluid w-50 h-50" alt="">
                    <div>{{ $m->avatar->name }}</div>
                @endif
                
                <div>{{ $user->name }}:{{ $m->content }}</div>
            @else
                @if( $m->avatar_id )
                    <img src="{{ asset($m->avatar->file_path) }}" class="img-fluid w-50 h-50" alt="">
                    <div>{{ $m->avatar->name }}</div>
                    <a href="{{ route('avatar.receive', ['id'=>$m->avatar_id]) }}">
                        <button>@lang('message.btn_receive')</button>
                    </a>
                @endif

                <div>{{ $friend->name }}:{{ $m->content }}</div>
            @endif
        @endforeach
    </div>
    <div>
        <form action="{{ route('message.store', ['id'=>$friend->id]) }}" method="post">
            @csrf
            <label for="">@lang('message.lbl_message')</label>
            <input type="text" name="content" id="">

            <label for="avatar">@lang('message.lbl_avatar')</label>
            <select name="avatar_id" id="avatar">
                <option value="">@lang('message.lbl_noAvatar')</option>
                @foreach($avatarList as $a)
                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                @endforeach  
            </select>
            <button>@lang('message.btn_send')</button>
        </form>
    </div>
</div>

@endsection