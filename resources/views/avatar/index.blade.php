@extends('layouts/master')

@section('title', __('avatar.title_index'))

@section('content')

<div class="row">
    <div class="col-12">
        @foreach ($avatarList as $a)
            <div>
                <img src="{{ asset($a->file_path) }}" class="img-fluid w-50 h-50" alt="tes">
                <label for="">{{$a->price}}</label>
                <a href="{{ route('avatar.buy', ['id'=>$a->id]) }}">
                    <button>@lang('avatar.button_buy')</button>
                </a>
            </div>
        @endforeach
    </div>
</div>

@endsection