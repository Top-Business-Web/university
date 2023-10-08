<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\SubjectExamStudent;
use App\Models\SubjectUnitDoctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class SubjectExamStudentController extends Controller
{


    public function normal(Request $request)
    {

        if ($request->ajax()) {

            $subject_exam_students = SubjectExamStudent::query()
                ->where('session', '=', 'عاديه')
                ->where('year', '=', period()->year_start)
                ->where('user_id', '=', Auth::id())
                ->get();

            return Datatables::of($subject_exam_students)

                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return  $subject_exam_students->user->identifier_id;
                })
                ->addColumn('doctor', function ($subject_exam_students) {
                    $subject_doctor = SubjectUnitDoctor::query()
                        ->where('period', '=', $subject_exam_students->period)
                        ->where('year', '=', $subject_exam_students->year)
                        ->where('group_id', '=', $subject_exam_students->subject_exam->group_id)
                        ->where('subject_id', '=', $subject_exam_students->subject_exam->subject_id)
                        ->first();
                    return $subject_doctor->doctor->first_name . " " . $subject_doctor->doctor->last_name;
                })
                ->addColumn('exam_code', function ($subject_exam_students) {
                    return  $subject_exam_students->subject_exam->exam_code;
                })
                ->addColumn('code', function ($subject_exams) {

                    return  $subject_exams->subject_exam->subject->subject_name;
                })

                ->editColumn('group_id', function ($subject_exams) {
                    return $subject_exams->subject_exam->group->group_name;
                })
                ->addColumn('exam_day', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->exam_day;
                })

                ->addColumn('exam_date', function ($subject_exam_students) {
                    return $subject_exam_students->subject_exam->exam_date;
                })

                ->addColumn('time_start', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_start;
                })

                ->addColumn('time_end', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_end;
                })

                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student.normal');
        }
    }

    public function remedial(Request $request)
    {

        if ($request->ajax()) {

            $subject_exam_students = SubjectExamStudent::query()
                ->where('session', '=', 'استدراكيه')
                ->where('year', '=', period()->year_start)
                ->where('user_id', '=', Auth::id())
                ->get();
                // dd($subject_exam_students);


            return Datatables::of($subject_exam_students)

                ->addColumn('identifier_id', function ($subject_exam_students) {
                    return  $subject_exam_students->user->identifier_id;
                })
                ->addColumn('exam_code', function ($subject_exam_students) {
                    return  $subject_exam_students->subject_exam->exam_code;
                })
                ->addColumn('code', function ($subject_exams) {

                    return  $subject_exams->subject_exam->subject->subject_name;
                })

                ->editColumn('group_id', function ($subject_exams) {
                    return $subject_exams->subject_exam->group->group_name;
                })

                ->addColumn('exam_date', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->exam_date;
                })

                ->addColumn('exam_day', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->exam_day;
                })


                ->addColumn('time_start', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_start;
                })

                ->addColumn('time_end', function ($subject_exam_students) {

                    return $subject_exam_students->subject_exam->time_end;
                })


                ->escapeColumns([])
                ->make(true);
        } else {
            return view('student.subject_exam_student.remedial');
        }
    }
}
