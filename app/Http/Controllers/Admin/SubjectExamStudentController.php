<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubjectExamStudentExport;
use App\Imports\SubjectExamStudentImport;
use App\Models\Department;
use App\Models\Group;
use App\Models\Period;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\SubjectExamStudent;
use App\Http\Controllers\Controller;

class SubjectExamStudentController extends Controller{


    public function index(request $request)
    {
        if ($request->ajax()) {

            $period = Period::query()
                ->where('status','=','start')
                ->first();

            $subject_exam_students = SubjectExamStudent::query()
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)
                ->get();

            return Datatables::of($subject_exam_students)
                ->addColumn('action', function ($subject_exam_students) {
                    return '
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' type="button" data-id="' . $subject_exam_students->id . '" class="btn btn-pill btn-info-light editBtn"><i class="fa fa-edit"></i></button>
                            <button '. (auth()->user()->user_type == 'student' ? 'hidden' : '') .' class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $subject_exam_students->id . '" data-title="'. $subject_exam_students->subject->subject_name .'">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('subject_id', function ($subject_exam_students) {
                    return '<td>' . $subject_exam_students->subject->subject_name . '</td>';
                })
                ->editColumn('user_id', function ($subject_exam_students) {
                    return '<td>' . $subject_exam_students->user->first_name . '</td>';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('admin.subject_exam_students.index');
        }
    }


    public function create(){

        $groups = Group::query()
            ->select('id','group_name')
            ->get();

        $units = Unit::query()
            ->select('id','unit_name')
            ->get();

        $departments = Department::query()
            ->select('id','department_name')
            ->get();

        return view('admin.subject_exam_students.parts.create',compact('groups','units','departments'));
    }


    public function store(Request $request): JsonResponse
    {

        $subject = Subject::query()
            ->where('id','=',$request->subject_id)
            ->first();

        if ($subject->students()->syncWithPivotValues($request->user_id,['exam_code' => $request->exam_code,'section' => $request->section,'period' => $request->period,'session' => $request->session_id,'year' =>  $request->year])) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }


    public function edit(SubjectExamStudent $subjectExamStudent)
    {

        return view('admin.subject_exam_students.parts.edit');
    }


    public function update(Request $request, SubjectExamStudent $subjectExamStudent): JsonResponse
    {
        if ($subjectExamStudent->update($request->all())) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 405]);
        }
    }



    public function destroy(Request $request)
    {
        $subject_exam_student = SubjectExamStudent::where('id', $request->id)->firstOrFail();
        $subject_exam_student->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    }


    public function allSubjects(Request $request): Collection
    {


        return Subject::query()
            ->where('group_id','=',$request->group_id)
            ->where('department_branch_id','=',$request->department_branch_id)
            ->where('unit_id','=',$request->unit_id)
            ->pluck('subject_name', 'id');
    }


    //get all students with subject_id

    public function allStudents(Request $request): Collection
    {

        $period = Period::query()
            ->where('status','=','start')
            ->first();


        return User::query()
            ->where('user_type','=','student')
            ->whereHas('subjects', fn(Builder $builder) =>
            $builder->where('subject_id',$request->subject_id)
                ->where('period','=',$period->period)
                ->where('year','=',$period->year_start)

            )
            ->pluck('first_name', 'id');
    }


    public function exportSubjectExamStudent(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new SubjectExamStudentExport(), 'SubjectExamStudent.xlsx');
    }


    public function importSubjectExamStudent(Request $request): JsonResponse
    {
        $import = Excel::import(new SubjectExamStudentImport(), $request->exelFile);
        if ($import) {
            return response()->json(['status' => 200]);
        } else {
            return response()->json(['status' => 500]);
        }
    }



}
