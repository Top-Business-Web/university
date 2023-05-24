@extends('admin/layouts/master')

@section('title')
    {{($setting->title) ?? ''}}  @lang('admin.Users_Branches')
@endsection
@section('page_name')
    @lang('admin.Users_Branches')
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> @lang('admin.Users_Branches') {{($setting->title) ?? ''}}</h3>
                    <div class="">
                        <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> @lang('admin.add') @lang('admin.User_Branch')
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>
                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">#</th>
                                <th class="min-w-50px"> {{__('admin.register_year')}}</th>
                                <th class="min-w-50px"> {{__('admin.branch_restart_register')}}</th>
                                <th class="min-w-50px"> {{__('admin.student_branch')}}</th>
                                <th class="min-w-50px"> {{__('admin.branch')}}</th>
                                <th class="min-w-50px rounded-end">{{__('admin.actions')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!--Delete MODAL -->
        <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">@lang('admin.delete') @lang('admin.User_Branch')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="delete_id" name="id" type="hidden">
                        <p>{{ trans('admin.delete_confirm') . ' ' . trans('admin.User_Branch') }}<span id="title"
                                                                                                  class="text-danger"></span>؟
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                            @lang('admin.close')
                        </button>
                        <button type="button" class="btn btn-danger" id="delete_btn">@lang('admin.delete') !</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL CLOSED -->

        <!-- Create Or Edit Modal -->
        <div class="modal fade" id="editOrCreate" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"
                            id="example-Modal3">{{ trans('admin.add') . ' ' . trans('admin.User_Branch')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('admin.close')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Create Or Edit Modal -->
    </div>
    @include('admin/layouts/myAjaxHelper')
@endsection
@section('ajaxCalls')
    <script>
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'register_year', name: 'register_year'},
            {data: 'branch_restart_register', name: 'branch_restart_register'},
            {data: 'user_id', name: 'user_id'},
            {data: 'department_branch_id', name: 'department_branch_id'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('userBranches.index')}}', columns);
        // Delete Using Ajax
        destroyScript('{{route('userBranches.destroy',':id')}}');
        // Add Using Ajax
        showAddModal('{{route('userBranches.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('userBranches.edit',':id')}}');
        editScript();
    </script>
@endsection


