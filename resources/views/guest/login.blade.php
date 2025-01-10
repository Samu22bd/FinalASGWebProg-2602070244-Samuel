@extends('layouts/master')

@section('title', __('guest.title_login'))

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

        <form action="{{ route('login') }}" method="post">
            @csrf
            <label for="">@lang('guest.lbl_email')</label>
            <input type="text" name="email" id="">

            <label for="">@lang('guest.lbl_password')</label>
            <input type="password" name="password" id="">

            <button>@lang('guest.btn_done')</button>
        </form>
        <div>
            <label for="">@lang('guest.lbl_register')</label>
            <a href="{{ route('register.show') }}">@lang('guest.a_register')</a>
        </div>
    </div>
</div>

@endsection