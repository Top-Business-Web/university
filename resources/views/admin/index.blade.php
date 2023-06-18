@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.dashboard')}}
@endsection
@section('page_name') {{ trans('admin.dashboard')}} @endsection
@section('content')

    <div class="row">

    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')

@endsection


