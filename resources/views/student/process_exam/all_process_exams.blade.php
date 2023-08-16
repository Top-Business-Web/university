@extends('admin.layouts.master')

@section('title')
    {{ trans('student_sidebar.process_exam') }}
@endsection
@section('page_name')
    {{ trans('student_sidebar.process_exam') }}
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">

                @if($processExamCount == 0)
                    <div class="card-header">
                        <h3 class="card-title"></h3>
                        <div class="">
                            <button class="btn btn-secondary btn-icon text-white addBtn">
									<span>
										<i class="fe fe-plus"></i>
									</span> {{ trans('process_exam.add_process_exam') }}
                            </button>
                        </div>
                    </div>
                @endif


                <div class="card-body">
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table table-striped table-bordered text-nowrap w-100" id="dataTable">
                            <thead>

                            <tr class="fw-bolder text-muted bg-light">
                                <th class="min-w-25px">{{trans('process_exam.id')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.identifier_id')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.student')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.year')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.period')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.reason')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.request_date')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.attachment_file')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.request_status')}}</th>
                                <th class="min-w-25px">{{trans('process_exam.delete_request')}}</th>


                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>

            <!--Delete MODAL -->
            <div class="modal fade" id="delete_modal"  role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('admin.delete') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input id="delete_id" name="id" type="hidden">
                            <p>{{ trans('admin.sure_delete') }} ? ["<span id="title" class="text-danger"></span>"]</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" id="dismiss_delete_modal">
                                {{ trans('admin.close') }}
                            </button>
                            <button type="button" class="btn btn-danger" id="delete_btn">{{ trans('admin.delete') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- MODAL CLOSED -->


            <!-- Create Or Edit Modal -->
            <div class="modal fade bd-example-modal-lg" id="editOrCreate" data-backdrop="static"  role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="example-Modal3"> {{ trans('process_exam.add_process_exam') }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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

        @include('admin.layouts.myAjaxHelper')
        @endsection
        @section('ajaxCalls')
            <script>


                var columns = [
                    {data: 'id', name: 'id'},
                    {data: 'identifier_id', name: 'identifier_id'},
                    {data: 'user_id', name: 'user_id'},
                    {data: 'year', name: 'year'},
                    {data: 'period', name: 'period'},
                    {data: 'reason', name: 'reason'},
                    {data: 'request_date', name: 'request_date'},
                    {data: 'attachment_file', name: 'attachment_file'},
                    {data: 'request_status', name: 'request_status'},
                    {data: 'action', name: 'action'},
                ]
                showData('{{route('get-all-process-exams')}}', columns);
                deleteScript('{{route('delete-process-exam')}}');
                showAddModal('{{route('create-process-exam')}}');
                addScript();



            </script>
@endsection
