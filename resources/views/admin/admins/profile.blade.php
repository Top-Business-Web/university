@extends('admin.layouts.master')
@section('title')
    {{$setting->title ?? ''}} {{ trans('admin.profile') }}
@endsection

@section('page_name')
    {{ trans('admin.profile') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="wideget-user text-center">
                        <div class="wideget-user-desc">
                            <div class="wideget-user-img">
                                <img class=""
                                     src="{{ ($user->image != null) ? asset('/uploads/users/'.$user->image) : asset('assets/uploads/avatar.gif') }}"
                                     alt="img">
                            </div>
                            <div class="user-wrap">
                                <h4 class="mb-1 text-capitalize">{{$user->first_name . ' ' . $user->last_name}}</h4>
                                <h6 class="text-muted mb-4">
                                    {{$user->email}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="wideget-user-tab">
                    <div class="tab-menu-heading">
                        <div class="tabs-menu1">
                            <ul class="nav">
                                <li class=""><a href="#tab-51" class="active show"
                                                data-toggle="tab">@lang('admin.information')</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-51">
                    <div class="card">
                        <div class="card-body">
                            <div id="profile-log-switch">
                                <div class="media-heading">
                                    <h5><strong>{{ trans('admin.more information') }}</strong></h5>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->first_name }}</h5>
                                <h5 class="col-6">{{ trans('admin.first_name') }} : {{ $user->last_name }}</h5>
                                <h5 class="col-12">{{ trans('admin.email') }} : {{ $user->email }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>

    @include('admin.layouts.myAjaxHelper')

    @section('ajaxCalls')
        <script>
            $('.dropify').dropify();

            $(document).ready(function () {
                $('select').select2();
            });
        </script>
    @endsection

@endsection


