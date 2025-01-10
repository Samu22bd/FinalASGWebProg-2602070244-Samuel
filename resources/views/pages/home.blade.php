@extends('layouts/master')

@section('title', __('pages.title_home'))

@section('content')

<div class="row">
    
    <div>
        @if(auth()->user())
            Notification
            @if(!empty($message) || !empty($friendReq))
                @if(!empty($message))
                <div>
                    @lang('pages.lbl_messages')
                    @foreach ($message as $m)
                        <div>{{$m->message->sender->name}} : {{$m->message->content}}</div>
                    @endforeach
                </div>
                @endif
                @if(!empty($friendReq))
                <div>
                    @lang('pages.lbl_friendRequests')
                    @foreach ($friendReq as $fr)
                        <div>{{ $fr->user->name }}</div>
                    @endforeach
                </div>
                @endif
            @else
                <div>@lang('pages.lbl_noNotification')</div>
            @endif
        @endif
    </div>

    <div class="col-12">
        <form action="{{ route('user.search') }}" method="GET">
            <div>
                <label for="gender">@lang('pages.lbl_gender')</label>
                <select name="gender" id="gender">
                    <option value="">@lang('pages.lbl_selectGender')</option>
                    <option value="male">@lang('pages.lbl_male')</option>
                    <option value="female">@lang('pages.lbl_female')</option>
                </select>
            </div>

            <div>
                <label for="">@lang('pages.lbl_hobbies')</label>
                <select name="hobbies" id="">
                <option value="">@lang('pages.lbl_selectHobbies')</option>
                @foreach ($hobbyList as $h)
                    <option value="{{ $h->id }}">{{ $h->name }}</option>
                @endforeach
                </select>
            </div>
        
            <button type="submit">@lang('pages.btn_search')</button>
        </form>
    </div>
    
    <div class="col-12">
        @foreach ($userList as $u)
        <div>
            @if($u->avatar)
            <img src="{{ asset($u->avatar->file_path) }}" class="img-fluid w-50 h-50" alt="User Profile Picture">
            @endif
            <h5>{{$u->name}}</h5>
            <form action="{{ route('wish.add', ['id'=>$u->id]) }}" method="POST">
                @csrf
                <button>@lang('pages.btn_like')</button>
            </form>
        </div>
        @endforeach
        {{ $userList->links() }}
    </div>
</div>

@endsection