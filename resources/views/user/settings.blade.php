@extends('layouts/master')

@section('title', __('user.title_settings'))

@section('content')

<div class="row">
    <div class="col-12">
        <a href="{{ route('user.visible') }}">
            <button> @lang('user.lbl_setVisible') </button>
        </a>
        <a href="{{ route('user.invisible') }}">
            <button> @lang('user.lbl_setInvisible') </button>
        </a>
    </div>
</div>

@endsection