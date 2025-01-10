@extends('layouts/master') 

@section('title', __('user.title_profile')) 

@section('content')

<div class="row">
    <div class="col-12">
        {{--
        <div>{{ $user }}</div>
        --}}

        @if(session('message'))
        <div class="alert alert-info">
            {{ session('message') }}
        </div>
        @endif

        @if(isset($user->avatar_id))
            {{-- <div>{{$user->avatar_id}}</div>
            <div>{{$user}}</div>
            <div>{{$user->avatar}}</div>
            <div>{{$user->avatars}}</div> --}}
            @if($user->is_visible == 0)
                @php
                    $randomPic = random_int(1, 3);
                @endphp
                <img src="{{ asset('avatars/bear'. $randomPic .'.jpg') }}" class="img-fluid w-50 h-50" alt="">
            @else
                <img src="{{ asset($user->avatar->file_path) }}" class="img-fluid w-50 h-50" alt="">
            @endif
        @else
            <div>@lang('user.lbl_noAvatar')</div>
        @endif

        <div>
            <label for="">@lang('user.lbl_email') {{$user->email}}</label>
        </div>
        <div>
            <label for="">@lang('user.lbl_name') {{$user->name}}</label>
        </div>
        <div>
            <label for="">@lang('user.lbl_gender') {{$user->gender}}</label>
        </div>
        <div>
            <label for="">@lang('user.lbl_insta') {{$user->instagram_username}}</label>
        </div>

        <div>
            <label for="">@lang('user.lbl_hobbies')</label>
            {{-- <div>{{$user->hobbies}}</div> --}}
            @foreach ($user->hobbies as $h)
            {{$h->name}}
            @endforeach
        </div>

        <div>
            <label for="">@lang('user.lbl_coins') {{$user->coins}}</label>
        </div>
        <div>
            <label for="">@lang('user.lbl_mobileNumber') {{$user->mobile_number}}</label>
        </div>
        <div>
            <label for="">@lang('user.lbl_birthDate') {{$user->birth_date}}</label>
        </div>

        {{-- {{$user->friends}} --}}
        <div>
            <label for="">@lang('user.lbl_visibility')
                @if($user->is_visible)
                    @lang('user.lbl_visible')
                @else
                    @lang('user.lbl_invisible')
                @endif
            </label>
        </div>

        <div>
            <label for=""><a href="{{ route('wish.show') }}"><button>See Wishlists</button></a></label>
        </div>
        <div>
            <label for=""><a href="{{ route('request.show') }}"><button>See Requests</button></a></label>
        </div>
        
        @if (count($friends))
        <table>
            <thead>
                <tr>
                    <th>@lang('user.th_number')</th>
                    <th>@lang('user.th_name')</th>
                    <th>@lang('user.th_Action')</th>
                </tr>
            </thead>
            <tbody>
                {{-- {{$friends}} --}}
                @foreach ($friends as $f)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    @if($f->user->id == $user->id)
                        <td>{{$f->friend->name}}</td>
                        <td>
                            <a href="{{ route('message.index', ['id'=>$f->friend->id]) }}">
                                <button>@lang('user.btn_message')</button>
                            </a>
                        </td>
                    @else
                        <td>{{$f->user->name}}</td>
                        <td>
                            <a href="{{ route('message.index', ['id'=>$f->user->id]) }}">
                                <button>@lang('user.btn_message')</button>
                            </a>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div>@lang('user.lbl_noFriend')</div>
        @endif
    </div>
</div>

@endsection
