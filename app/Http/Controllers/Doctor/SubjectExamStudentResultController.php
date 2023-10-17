<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Http\Middleware\CheckForbidden;
use App\Models\SubjectExamStudent;
use App\Models\SubjectExamStudentResult;
use App\Models\SubjectUnitDoctor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use mysql_xdevapi\Collection;
use Yajra\DataTables\DataTables;

class SubjectExamStudentResultController extends Controller
{

    public function __construct()
    {
        $this->middleware(CheckForbidden::class);
    }


    public function index(request $request)
    {


        $ids = SubjectUnitDoctor::query()
            ->where('period', '=', period()->period)
            ->where('year', '=', period()->year_start)
            ->where('user_id', '=', auth()->id())
            ->get();

        $subject_exam_student_results = collect(); // Initialize an empty collection

        for ($i = 0; $i < count($ids); $i++) {
            $data = SubjectExamStudentResult::query()
                ->where('subject_id', $ids[$i]->subject_id)
                ->where('group_id', $ids[$i]->group_id)
                ->where('year', '=', period()->year_start)
                ->get();
            $subject_exam_student_results = $subject_exam_student_results->concat($data);
        }

        if ($request->ajax()) {

            return Datatables::of($subject_exam_student_results)
                ->editColumn('user_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->first_name . ' ' . $subject_exam_student_results->user->last_name;
                })
                ->addColumn('group_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->group->group_name;
                })
                ->editColumn('subject_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->subject->subject_name;
                })
                ->addColumn('identifier_id', function ($subject_exam_student_results) {
                    return $subject_exam_student_results->user->identifier_id;
                })
                ->addColumn('exam_number', function ($subject_exam_student_results) {

                    return @SubjectExamStudent::query()
                        ->where('year', '=', period()->year_start)
                        ->where('period', '=', period()->period)
                        ->where('user_id',$subject_exam_student_results->user_id)
                        ->with('subject_exam')
                        ->whereHas('subject_exam', function ($query) use ($subject_exam_student_results) {
                            $query->where('subject_id', '=', $subject_exam_student_results->subject_id)
                                ->where('group_id', '=', $subject_exam_student_results->group_id);
                        })
                        ->first()->exam_number;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('doctor.subject_exam_student_result.get_all_subject_exam_student_results');
        }
    }

}
