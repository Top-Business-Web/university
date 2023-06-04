<link href="{{asset('assets/admin')}}/plugins/select2/select2.min.css" rel="stylesheet"/>


<div class="container modalContent">
    <form id="addForm" class="addForm" method="POST" enctype="multipart/form-data" action="{{ route('schedules.store') }}">
        @csrf
        <div class="form-group">
            <div class="row">

                <div class="col-md-6">
                    <label for="group_id" class="form-control-label">@lang('admin.group_name')</label>
                    <select class="form-control" name="group_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id}}">{{ $group->getTranslation('group_name', app()->getLocale()) }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-md-6">
                    <label for="department_id" class="form-control-label">@lang('admin.department')</label>
                    <select class="form-control" name="department_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id}}">{{ $department->getTranslation('department_name', app()->getLocale())}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="department_branch_id" class="form-control-label">@lang('admin.branch')</label>
                    <select class="form-control" name="department_branch_id" required>
                        <option value="" selected disabled>@lang('admin.select')</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control">
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control">
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">استدراكي</option>
                    </select>
                </div>



                <div class="col-md-6">
                    <label for="pdf_upload" class="form-control-label">@lang('admin.year')</label>
                    <input type="text" class="form-control" name="year" id="year">
                </div>

                <div class="col-md-12">
                    <label for="pdf_upload" class="form-control-label">@lang('admin.schedule_pdf_upload')</label>
                    <input type="file" class="form-control" name="pdf_upload" id="pdf_upload">
                </div>


            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('admin.close') }}</button>
            <button type="submit" class="btn btn-primary" id="addButton">{{ trans('admin.add') }}</button>
        </div>
    </form>
</div>

<script>
    $('.dropify').dropify()


    $('select[name="department_id"]').on('change', function() {
        localStorage.setItem('department_id', $(this).val());
        $.ajax({
            method: 'GET',
            url: '{{ route('getBranches') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="department_branch_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="department_branch_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="department_branch_id"]').empty();
                    $('select[name="department_branch_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })
</script>