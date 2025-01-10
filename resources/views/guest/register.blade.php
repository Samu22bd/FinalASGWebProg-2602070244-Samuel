@extends('layouts/master')

@section('title', __('guest.title_register'))

@section('content')

<div class="row">
    <div class="col-12">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            $price = random_int(100000, 125000)
        @endphp

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label for="">@lang('guest.lbl_email')</label>
                <input type="email" name="email" id="">
            </div>

            <div>
                <label for="">@lang('guest.lbl_name')</label>
                <input type="text" name="name" id="">
            </div>

            <div>
                <label for="">@lang('guest.lbl_insta')</label>
                <input type="text" name="instagram_username" id="">
            </div>

            <div>
                <label for="">@lang('guest.lbl_gender')</label>
                <select name="gender" id="">
                    <option value="male">@lang('guest.lbl_male')</option>
                    <option value="female">@lang('guest.lbl_female')</option>
                </select>
            </div>

            <div>
                <label for="">@lang('guest.lbl_password')</label>
                <input type="password" name="password" id="">
            </div>
            
            <div>
                <label for="">@lang('guest.lbl_hobbies')</label>
                @foreach ($hobbyList as $h)
                <div>
                    <input type="checkbox" name="hobbies[]" value="{{ $h->id }}" id="hobby_{{ $h->id }}">
                    <label for="{{ $h->id }}">{{ $h->name }}</label>
                </div>
                @endforeach
            </div>

            <div>
                <label for="">@lang('guest.lbl_mobileNumber')</label>
                <input type="text" name="mobile_number" id="">
            </div>

            <div>
                <label for="">@lang('guest.lbl_birthDate')</label>
                <input type="date" name="birth_date" id="">
            </div>

            <div>
                <label for="">@lang('guest.lbl_price') {{ $price }}</label>
                <input type="text" name="registration_price" id="" value="{{$price}}" hidden>
            </div>
            <button>@lang('guest.btn_done')</button>
        </form>
        <div>
            <label for="">@lang('guest.lbl_login')</label>
            <a href="{{ route('login.show') }}">@lang('guest.a_login')</a>
        </div>
    </div>
</div>

@endsection