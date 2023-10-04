<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\ProcessDegree;
use App\Models\SubjectExamStudent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProcessDegreeController extends Controller{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }

    public function normal(Request $request)
    {
        $process_degrees = ProcessDegree::query()
            ->where('period', '=', 'عاديه')
            ->where('year', '=', period()->year_start)
            ->where('doctor_id','=',auth()->id())
        ->get();

        if ($request->ajax()) {
            return Datatables::of($process_degrees)

            ->addColumn('request_status', function ($process_degrees) {
                if ($process_degrees->request_status === 'refused') {
                    return '<td><a class="btn btn-danger text-white">' . trans('admin.refused') . '</a></td>';
                } elseif ($process_degrees->request_status === 'accept') {
                    return '<td><a class="btn btn-success text-white">' . trans('admin.accept') . '</a></td>';
                } else {
                    return '<select class="form-control" data-id="' .
                        $process_degrees->id .
                        '" onchange="updateRequestStatus(this, ' .
                        $process_degrees->id .
                        ')">
                        <option ' .
                        ($process_degrees->request_status == 'accept' ? 'selected' : '') .
                        ' value="accept">' .
                        trans('admin.accept') .
                        '</option>
                        <option ' .
                        ($process_degrees->request_status == 'refused' ? 'selected' : '') .
                        ' value="refused">' .
                        trans('admin.refused') .
                        '</option>
                        <option ' .
                        ($process_degrees->request_status == 'under_processing' ? 'selected' : '') .
                        ' value="under_processing">' .
                        trans('admin.under_processing') .
                        '</option>
                    </select>';
                }
            })

                ->addColumn('exam_number', function ($process_degrees) {

                    return @SubjectExamStudent::query()
                        ->where('year','=',period()->year_start)
                        ->where('period','=',period()->period)
                        ->with('subject_exam')
                        ->whereHas('subject_exam', fn(Builder $builder) =>

                        $builder->where('subject_id', '=', $process_degrees->subject_id))
                        ->first()->exam_number;
                })

                ->addColumn('subject', function ($process_degrees) {
                    return $process_degrees->subject->subject_name ;
                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
                })
                ->addColumn('student_name', function ($process_degrees) {
                    return $process_degrees->user->first_name . ' ' . $process_degrees->user->last_name;
                })

                ->addColumn('request_date', function ($process_degrees) {
                    return $process_degrees->created_at->format('Y-m-d');
                })
                ->addColumn('subject_id', function ($process_degrees) {
                    return $process_degrees->subject->subject_name;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('doctor.process_degrees.normal');
        }
    }



    public function remedial(Request $request)
    {
        $process_degrees = ProcessDegree::query()
            ->where('period', '=', 'استدراكيه')
            ->where('year', '=', period()->year_start)
            ->where('doctor_id','=',auth()->id())
            ->get();

        if ($request->ajax()) {
            return Datatables::of($process_degrees)

                ->editColumn('request_status', function ($process_degrees){

                    if ($process_degrees->request_status === 'accept') {

                        return  trans('admin.accept');
                    }elseif ($process_degrees->request_status === 'refused'){

                        return  trans('admin.refused');

                    }elseif ($process_degrees->request_status === 'under_processing'){

                        return trans('admin.under_processing');
                    }else{

                        return trans('admin.new');
                    }

                })

                ->addColumn('exam_number', function ($process_degrees) {

                    return @SubjectExamStudent::query()
                        ->where('year','=',period()->year_start)
                        ->where('period','=',period()->period)
                        ->with('subject_exam')
                        ->whereHas('subject_exam', fn(Builder $builder) =>

                        $builder->where('subject_id', '=', $process_degrees->subject_id))
                        ->first()->exam_number;
                })

                ->addColumn('subject', function ($process_degrees) {
                    return $process_degrees->subject->subject_name ;
                })
                ->addColumn('identifier_id', function ($process_degrees) {
                    return $process_degrees->user->identifier_id;
                })
                ->addColumn('student_name', function ($process_degrees) {
                    return $process_degrees->user->first_name . ' ' . $process_degrees->user->last_name;
                })

                ->addColumn('request_date', function ($process_degrees) {
                    return $process_degrees->created_at->format('Y-m-d');
                })
                ->addColumn('subject_id', function ($process_degrees) {
                    return $process_degrees->subject->subject_name;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('doctor.process_degrees.remedial');
        }
    }
}
