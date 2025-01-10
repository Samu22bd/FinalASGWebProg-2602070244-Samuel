@extends('layouts/master')

@section('title', __('user.title_myCoin'))

@section('content')

<div class="row">
    <div class="col-12">
        <div>
            @lang('user.lbl_myCoin'){{$user->coins}}
        </div>
        <a href="{{ route('coin.add') }}">
            <button>@lang('user.btn_addCoin')</button>
        </a>
    </div>
</div>

@endsection