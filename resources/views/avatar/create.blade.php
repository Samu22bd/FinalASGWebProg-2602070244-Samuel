@extends('layouts/master')

@section('title', __('avatar.title_create'))

@section('content')

<div class="row">
    <div class="col-12">
        <h1>
            @lang('avatar.h1_upload')
        </h1>
        <div>
            <form action="{{ route('avatar.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="">@lang('avatar.lbl_name')</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label for="">@lang('avatar.lbl_price')</label>
                    <input type="text" name="price">
                </div>
                <div class="form-group">
                    <label for="">@lang('avatar.lbl_avatar')</label>
                    <input type="file" class="form-control" name="avatar" id="">
                </div>
                <button>@lang('avatar.lbl_create')</button>
            </form>
        </div>
    </div>
</div>

@endsection