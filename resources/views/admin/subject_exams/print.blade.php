<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{ $university_settings->title }}</title>
    <link href="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}" rel="icon"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{ asset('certificate_student_exam_assets') }}/css/all.min.css"/>
    <link rel="stylesheet" href="{{ asset('certificate_student_exam_assets') }}/css/bootstrap.min.css"/>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Jost:wght@200;300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet"/>

    <style>

        .dataTables_filter{
            display: none;
        }
        .dataTables_length{
            display: none;
        }
        .dataTables_info{
            display: none;
        }
        .dataTables_paginate{
            display: none;
        }

        table.dataTable thead .sorting:before, table.dataTable thead .sorting_asc:before, table.dataTable thead .sorting_desc:before, table.dataTable thead .sorting_asc_disabled:before, table.dataTable thead .sorting_desc_disabled:before{
            display: none !important;
        }
        table.dataTable thead .sorting:after, table.dataTable thead .sorting_asc:after, table.dataTable thead .sorting_desc:after, table.dataTable thead .sorting_asc_disabled:after, table.dataTable thead .sorting_desc_disabled:after{
            display: none !important;
        }

        table {
            width: 100%;
            border: 1px solid black;
        }

        thead {
            background-color: #eb9984;
        }

        table td {
            border: 1px solid black;
            padding: 1px;
            width: 10% !important;
        }

        .border1 {
            border: 1px solid #618597;
        }

        .border2 {
            border: 15px solid #618597;
            margin: 2px;
        }

        .border3 {
            border: 1px solid #618597;
            margin: 2px;
        }

        .image-logo1 {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .image-logo1 img {
            height: 100px;
        }

        .border-color {
            border: 1px solid black;
            width: 40%;
            font-weight: bold;
        }

        .table td {
            padding: 0.2rem !important;
        }

        @media print {
            body {
                font-size: 10px;
                margin-bottom: 0px !important;
            }

            @page {
                size: A4 landscape;
                margin: 5mm; /* You can adjust the margin as needed */
            }
            .logo-stud{
                width: 90px !important;
                height: 90px !important;
            }

            .divPrint {
                width: 100px !important;
                bottom: 14px;
                position: relative;
            }

            .table td {
                padding: 0.2rem !important;
            }

            .print-div td {
                padding: 1px !important;
                font-size: 0.65rem !important;
            }

            .p-5 {
                padding: 10px !important;
            }

            .print {
                font-size: 10px;
            }
            .img-print {
                width: 90px !important;
            }
            .mb-4 {
                margin-bottom: 0px;
            }
            .mt-4 {
                margin-top: 0px !important;
            }
            .image-logo1 {
                margin-bottom: 0px;
            }

        }

    </style>
</head>

<body>
<div class="section text-right">
    <div class="container">
        <div class="border1" id="divPrint">
            <div class="border2">
                <div class="border3">
                    <div class="p-5">
                        <div class="row">
                            <div class="left_section_1 col-6">
                                <h5 class="mb-2 print">استدعاء الامتحانات</h5>
                                <p>{{ period()->year_start }}: {{ period()->year_end }}</p>
                                <h6 class="mb-4 print">{{ period()->period  }}</h6>
                            </div>
                            <!--end left_section_1 -->
                            <div class="image-logo1 right_section_1 col-6">
                                <img src="{{ asset('/uploads/university_setting/'.$university_settings->logo) }}"/>
                            </div>
                            <!--end right_section_1 -->
                        </div>
                        <!-- End Row -->

                        <div class="row">
                            <div class="col-2  d-flex justify-content-center">
                                <img src="{{ asset('uploads/users/'.auth()->user()->image) }}"
                                     alt="{{ auth()->user()->first_name }}" style="width: 140px; height: 120px"
                                     class="img-fluid logo-stud"/>
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <td class="border-color">الاسم الكامل</td>
                                        <td>{{ auth()->user()->first_name . ' ' . auth()->user()->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">رقم التسجيل</td>
                                        <td>{{ auth()->user()->identifier_id }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">رقم أبووجي</td>
                                        <td>{{ auth()->user()->points }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">الرقم الوطني</td>
                                        <td>{{ auth()->user()->national_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-color">
                                            رقم البطاقة الوطنية/جواز السفر
                                        </td>
                                        <td>{{ auth()->user()->national_id }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class=" col-2 d-flex justify-content-center divPrint">
                                {!!  QrCode::size(120)->generate(route('/')) !!}
                            </div>
                        </div>
                        <!--End Row -->
                        <!--start table -->
                        <table id="printDiv" class="print-div">
                            <thead>
                            <tr>
                                <th class="min-w-50px">{{ trans('admin.unit_name') }}</th>
                                <th class="min-w-25px">{{ trans('admin.subject_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.group_name_') }}</th>
                                <th class="min-w-25px">{{ trans('admin.session') }}</th>
                                <th class="min-w-25px">{{ trans('admin.day_name_') }}</th>
                                <th class="min-w-50px" class="sort" data-sort="date">{{ trans('admin.date_') }}</th>
                                <th class="min-w-50px" class="sort" data-sort="time">{{ trans('admin.time_') }}</th>
                                <th class="min-w-50px">{{ trans('admin.section_') }}</th>
                                <th class="min-w-25px">{{trans('subject_student_data.exam_number_name')}}</th>
                                <th class="min-w-25px">{{ trans('admin.doctor') }}</th>


                            </tr>
                            </thead>
                            <tbody>

                            @foreach($subject_exam_students as $subject_exam_student)

                                @php
                                    $doctor = App\Models\SubjectUnitDoctor::query()
                                    ->whereHas('doctor', function ($q) use($subject_exam_student){
                                        $q->where('subject_id',$subject_exam_student->subject_exam->subject->id)
                                        ->where('group_id',$subject_exam_student->subject_exam->group->id);
                                    })
                                    ->whereIn('subject_id',$array)
                                    ->where('period', '=',period()->period)
                                    ->where('year', '=', period()->year_start)->first()->doctor
                                @endphp
                                <tr>
                                    <td>{{ $subject_exam_student->subject_exam->subject->unit->unit_name }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->subject->subject_name }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->group->group_name }}</td>
                                    <td>عاديه</td>
                                    <td>{{ $subject_exam_student->subject_exam->exam_day }}</td>
                                    <td>{{ $subject_exam_student->subject_exam->exam_date }}</td>
                                    <td>{{$subject_exam_student->subject_exam->time_start . ' - ' . $subject_exam_student->subject_exam->time_end}}</td>
                                    <td>{{ $subject_exam_student->section }}</td>
                                    <td>{{ $subject_exam_student->exam_number }}</td>
                                    <td>{{ $doctor->first_name . " " .$doctor->last_name}}</td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!--End table -->

                        <div class="d-flex justify-content-between">
                            <p class="mt-4 mb-3 fw-bold">
                                تنبيهات:
                                <br>• الحضور الي مقر الامتحانات نصف ساعة قبل الموعد المحدد.
                                <br>• يمنع منعا كليا ادخال او استعمال الهاتف النقال والاجهزه الالكترونية داخل قاعات
                                الامتحانات .
                                <br>• احترام لجنه الامتحانات والالتزام التام بضوابط اجراء الامتحانات .
                                <br>
                            </p>


                            <div class="">
                                <div class="">
                                    <div>ختم المؤسسة</div>
                                </div>
                                <div>
                                    <img class="img-print" style="width: 100px;"
                                         src="{{ asset('/uploads/university_setting/'.$university_settings->stamp_logo) }}">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('admin.layouts.scripts')

<script src="{{ asset('certificate_student_exam_assets') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('certificate_student_exam_assets') }}/js/all.min.js"></script>
<script>
    window.print();

    $(document).ready(function () {
        var table = $('#printDiv').DataTable({
            "order": [[5, 'asc'], [6, 'asc']], // Initial sorting by the first column (Name) and then the second column (Age)
            "columnDefs": [
                {"targets": [0, 1], "orderData": [0, 1]} // Allow sorting by both columns
            ],
        });
    });


</script>
</body>

</html>
