@extends('layouts/master')

@section('title', __('payment.title_payment'))

@section('content')

<div class="row">
    <div class="col-12">

        @if(session('overpaid'))
            <div>@lang('payment.overpaid1'){{ session('overpaid')['overpay'] }}@lang('payment.overpaid2')</div>
            <a href="{{ route('payment.show', ['price' => $price]) }}">
                <button>@lang('payment.btn_yes')</button>
            </a>
            <br>
            <a href="{{ route('payment.overpay', ['overpay' =>  session('overpaid')['overpay'] ]) }}">
                <button>@lang('payment.btn_no')</button>
            </a>
        @else
            @if(session('underpaid'))
                <div>@lang('payment.underpaid'){{ session('underpaid')['underpay' ]}}</div>
            @endif

            <form action="{{ route('payment') }}" method="POST">
                @csrf
                <label for="">@lang('payment.lbl_price'){{$price}}</label>
                <input type="text" name="registration_price" id="" value="{{$price}}" hidden>
                <input type="text" name="registration_pay" id="">

                @if(!session('overpaid'))
                    <button>@lang('payment.btn_pay')</button>
                @endif
            </form>
        @endif        
    </div>
</div>

@endsection