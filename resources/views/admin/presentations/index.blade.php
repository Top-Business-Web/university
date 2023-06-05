@extends('admin/layouts/master')

@section('title')
    {{ trans('admin.presentations') }}
@endsection
@section('page_name')
    {{ trans('admin.presentations') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @lang('admin.presentations') {{ $setting->title ?? '' }}</h3>
                </div>
                <div class="card-body">
                    <div class="modal-body">
                        <form id="updateForm" class="updateForm" method="POST"
                            action="{{ route('presentations.update', $presentations->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="{{ $presentations->id }}" name="id">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.images') }}</label>
                                        <input type="file" class="form-control dropify" multiple
                                            data-default-file="{{ asset($presentations->images[0]) }}" name="images[]"
                                            value="{{ asset($presentations->images[0]) }}">
                                    </div>
                                    <div class="col-md-8">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.category') }}</label>
                                        <select class="form-control" name="category_id">
                                            @foreach ($categories as $category)
                                                <option
                                                    {{ $presentations->category_id == $category->id ? ' selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->category_name[lang()] }}
                                                </option>
                                            @endforeach
                                        </select>

                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.experience_year') }}</label>
                                        <input type="number" class="form-control"
                                            value="{{ $presentations->experience_year }}" name="experience_year">
                                    </div>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.title') . ' ' . trans('admin.arabic') }}</label>
                                        <input type="text" class="form-control"
                                            value="{{ $presentations->title['ar'] }}" name="title[ar]" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.title') . ' ' . trans('admin.english') }}</label>
                                        <input type="text" class="form-control"
                                            value="{{ $presentations->title['en'] }}" name="title[en]" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar"
                                            class="form-control-label">{{ trans('admin.tile') . ' ' . trans('admin.france') }}</label>
                                        <input type="text" class="form-control"
                                            value="{{ $presentations->title['fr'] }}" name="title[fr]" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.arabic') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[ar]" required>{{ $presentations->description['ar'] }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.english') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[en]" required>{{ $presentations->description['en'] }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.description') }}
                                            {{ trans('admin.france') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="description[fr]" required>{{ $presentations->description['fr'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.sub_desc') }}
                                            {{ trans('admin.arabic') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="sub_desc[ar]" required>{{ $presentations->sub_desc['ar'] }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.sub_desc') }}
                                            {{ trans('admin.english') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="sub_desc[en]" required>{{ $presentations->sub_desc['en'] }}</textarea>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name_ar" class="form-control-label">{{ trans('admin.sub_desc') }}
                                            {{ trans('admin.france') }}</label>
                                        <textarea type="text" rows="5" class="form-control editor" name="sub_desc[fr]" required>{{ $presentations->sub_desc['fr'] }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success"
                                    id="updateButton">@lang('admin.update')</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        $('.dropify').dropify()
                    </script>
                    <script src="{{ asset('assets/admin/ckeditor/ckeditor.js') }}"></script>
                    <script>
                        // CKEDITOR.replaceAll();
                    </script>

                </div>
            </div>
        </div>
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        CKEDITOR.replaceAll();

        $('.dropify').dropify();

        $(document).ready(function() {
            $('select').select2();
        });
        editScript();
    </script>
@endsection
