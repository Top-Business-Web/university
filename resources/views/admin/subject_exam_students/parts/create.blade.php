<div class="modal-body">
    <form id="addForm" class="addForm" method="POST" action="{{ route('subject_exam_students.store') }}"
          enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-label">@lang('admin.group_name')</label>
                    <select class="form-control" name="group_id" id="group_id">
                        <option value="" disabled>{{ trans('admin.select') . ' ' . trans('admin.group') }}</option>
                        @foreach($groups as $group)
                            <option value="{{ $group->id }}">{{ $group->getTranslation('group_name',lang()) }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">@lang('admin.department_name')</label>
                    <select class="form-control" name="department_id">
                        <option value="" disabled>{{ trans('admin.select') . ' ' . trans('admin.department') }}</option>
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}">
                                {{ $department->getTranslation('department_name',lang()) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="group_id" class="form-label">@lang('admin.department_branch_name')</label>
                    <select class="form-control" name="department_branch_id" id="department_branch_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.department') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="department_id" class="form-label">@lang('admin.select') @lang('admin.subject')</label>
                    <select class="form-control" name="subject_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.subject') }}</option>
                    </select>
                </div>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="department_id" class="form-label">@lang('admin.select') @lang('admin.student')</label>
                    <select class="form-control" name="user_id" id="user_id">
                        <option value="">{{ trans('admin.select') . ' ' . trans('admin.subject') }}</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="exam_code" class="form-control-label">{{ trans('admin.exam_code') }}</label>
                    <input type="text" class="form-control" name="exam_code" required>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="section" class="form-control-label">{{ trans('admin.section')  }}</label>
                    <input type="text" class="form-control" name="section" required>
                </div>
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.period') }}</label>
                    <select name="period" class="form-control" required>
                        <option value="ربيعيه" style="text-align: center">{{ trans('admin.autumnal') }}</option>
                        <option value="خريفيه" style="text-align: center">{{ trans('admin.fall') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="period" class="form-control-label">{{ trans('admin.session') }}</label>
                    <select name="session" class="form-control" required>
                        <option value="عاديه" style="text-align: center">{{ trans('admin.normal') }}</option>
                        <option value="استدراكيه" style="text-align: center">{{ trans('admin.remedial') }}</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="year" class="form-control-label">{{ trans('admin.year') }}</label>
                    <select name="year" class="form-control" required>
                        @for($year = 2023; $year < \Carbon\Carbon::now()->year +50 ; $year++)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endfor
                    </select>
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
    $('.dropify').dropify();

    $('select').select2();

    // get subject
    $('select[name="group_id"]').on('change', function() {
        localStorage.setItem('group_id', $(this).val());

        $.ajax({
            method: 'GET',
            url: '{{ route('getSubject') }}',
            data : {
                'id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="subject_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="subject_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="subject_id"]').empty();
                    $('select[name="subject_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });

    })

    // get department branch
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

    $('select[name="subject_id"]').on('change', function() {
        localStorage.setItem('subject_id', $(this).val());
        console.log($(this).val());

        $.ajax({
            method: 'GET',
            url: '{{ route('getStudent') }}',
            data : {
                'group_id' : localStorage.getItem('group_id'),
                'subject_id' : $(this).val(),
            },
            success: function(data) {
                if(data !== 404){
                    $('select[name="user_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="user_id"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                } else if(data === 404){
                    $('select[name="user_id"]').empty();
                    $('select[name="user_id"]').append('<option value="">{{ trans('admin.No results') }}</option>');

                }
            }
        });
    })



</script>
