<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DataModificationController;
use App\Http\Controllers\Admin\DepartmentBranchController;
use App\Http\Controllers\Admin\DepartmentBranchStudentController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\DocumentTypeController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PeriodController;
use App\Http\Controllers\Admin\PointStatementController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DeadlineController;
use App\Http\Controllers\Admin\InternalAdController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WordController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\AdvertisementController;
use App\Http\Controllers\Admin\GroupController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\SubjectExamController;
use App\Http\Controllers\Admin\SubjectStudentController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\SubjectUnitDoctorController;
use App\Http\Controllers\Admin\UniversitySettingController;
use App\Http\Controllers\Admin\SubjectExamStudentController;
use App\Http\Controllers\Admin\ElementController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ProcessDegreeController;
use App\Http\Controllers\Admin\ProcessExamController;
use App\Http\Controllers\Admin\ReasonRedresseController;
use App\Http\Controllers\Admin\SubjectExamStudentResultController;
use App\Http\Controllers\Admin\CertificateTypeController;
use App\Http\Controllers\Admin\ReRecordTheTrackController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    Route::get('/login-admin', [LoginController::class, 'index'])->name('admin.login');
    Route::get('/login-student', [LoginController::class, 'indexStudent'])->name('student.login');
    Route::get('/active-student', [LoginController::class, 'activeStudent'])->name('activeStudent');
    Route::post('/activeStudents', [LoginController::class, 'activeStudents'])->name('activeStudents');
    Route::get('/activeStd/{token}', [LoginController::class, 'activeStd'])->name('activeStd');
    Route::get('/resetPassView/', [LoginController::class, 'resetPassView'])->name('resetPassView');
    Route::post('/resetPass', [LoginController::class, 'resetPass'])->name('resetPass');
    Route::get('/doResetPass/{token}', [LoginController::class, 'doResetPass'])->name('doResetPass');
    Route::post('/DoneResetPass', [LoginController::class, 'DoneResetPass'])->name('DoneResetPass');
    Route::post('/do-login', [LoginController::class, 'login'])->name('login');

});

    Route::get('/emailSentBack', function () {
        return view('admin.mail.emailSentBack');
    })->name('emailSentBack');
    Route::get('/forbidden', function () {
        return view('admin.error.forbidden');
    })->name('forbidden');

Route::group([
    'prefix' => LaravelLocalization::setLocale() . '/dashboard',
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
], function () {


    ###################### Category #############################
    Route::resource('categories', CategoryController::class)->middleware('forbidden');

    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');


    #### Users ####
    Route::resource('users', UserController::class)->except(['show']);
    Route::post('users.delete', [UserController::class, 'delete'])->name('users.delete');
    Route::get('users/point', [UserController::class, 'pointUser'])->name('users.show');


    #### Admins ####
    Route::resource('admins', AdminController::class)->except(['show'])->middleware('forbidden');
    Route::post('admins.delete', [AdminController::class, 'delete'])->name('admins.delete')->middleware('forbidden');
    //user
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');
    Route::post('updatePass', [AdminController::class, 'updatePass'])->name('updatePass');

    Route::group(['middleware' => 'forbidden'],function (){
        #### Deadline ####
        Route::resource('deadlines', DeadlineController::class);

        #### Setting ####
        Route::resource('settings', SettingController::class);

        #### Service ####
        Route::resource('services', ServiceController::class);

        #### departments ####
        Route::resource('departments', DepartmentController::class);

        #### sliders ####
        Route::resource('sliders', SliderController::class);

        #### pages ####
        Route::resource('pages', PageController::class);

        #### word ####
        Route::resource('word', WordController::class);

        #### branches ####
        Route::resource('branches', DepartmentBranchController::class);
    });

    #### user branches ####
    Route::resource('userBranches', DepartmentBranchStudentController::class)->middleware('forbidden');
    Route::get('getBranches', [DepartmentBranchStudentController::class, 'getBranches'])->name('getBranches')->middleware('forbidden');
    Route::get('exportDepartmentBranchStudent', [DepartmentBranchStudentController::class, 'exportDepartmentBranchStudent'])->name('exportDepartmentBranchStudent')->middleware('forbidden');
    Route::post('importDepartmentBranchStudent', [DepartmentBranchStudentController::class, 'importDepartmentBranchStudent'])->name('importDepartmentBranchStudent')->middleware('forbidden');

    #### Internal Ads ####
    Route::resource('internal_ads', InternalAdController::class);
    Route::post('active_status', [InternalAdController::class, 'makeActive'])->name('makeActive');
    Route::get('internal_ad/student/{id}', [InternalAdController::class, 'editInternalStudent'])->name('internal_ads_show');
    Route::get('internal_ad/student', [InternalAdController::class, 'internalAdsStudent'])->name('internal_ads.show');


    Route::group(['middleware' => 'forbidden'],function (){
        #### Video ####
        Route::resource('video', VideoController::class);

        #### Advertisement ####
        Route::resource('advertisements', AdvertisementController::class);

        #### Presentation ####
        Route::resource("presentations", PresentationController::class);

        #### Slider ####
        Route::resource('slider', SliderController::class);

        #### Group ####
        Route::resource('group', GroupController::class);

        ### Subject ####
        Route::resource('subjects', SubjectController::class);

        #### Unit ####
        Route::resource('unit', UnitController::class);

    });

    #### data_modify ####
    Route::resource('data_modify', DataModificationController::class);

    #### Subject Student ####
    Route::resource('subject_student', SubjectStudentController::class);

    #### Subject Unit Doctor ####
    Route::resource('subject_unit_doctor', SubjectUnitDoctorController::class)->middleware('forbidden');
    Route::get('getAllSubjectsOfFUnitId', [SubjectUnitDoctorController::class, 'getAllSubjectsOfUnitId'])->name('dashboard.getAllSubjectsOfUnitId')->middleware('forbidden');

    #### University Setting
    Route::resource('university_settings', UniversitySettingController::class)->middleware('forbidden');
    Route::post('maintenanceCheck', [UniversitySettingController::class, 'maintenanceCheck'])->name('maintenanceCheck')->middleware('forbidden');

    #### Subject Exam ####
    Route::resource('subject_exams', SubjectExamController::class);
    Route::get('/students-exam-print/', [SubjectExamController::class, 'student_exam_print'])->name('subject_exams.print')->middleware('forbidden');
    Route::get('remedial_session', [SubjectExamController::class, 'remedialSession'])->name('remedialSession')->middleware('forbidden');
    Route::get('normal_session', [SubjectExamController::class, 'normalSession'])->name('normalSession')->middleware('forbidden');
    Route::get('create_remedial', [SubjectExamController::class, 'createRemedial'])->name('createRemedial')->middleware('forbidden');
    Route::get('getAllSubjectOfDepartmentBranchById', [SubjectExamController::class, 'getSubject'])->name('getAllSubjectOfDepartmentBranchById')->middleware('forbidden');

    Route::get('subject_exams/students/all', [\App\Http\Controllers\Student\SubjectExamController::class, 'index'])->name('subject_exams.students.all');

    #### Subject Exam Student ####
    Route::resource('subject_exam_students', SubjectExamStudentController::class);
    Route::get('getStudent', [SubjectExamStudentController::class, 'getStudent'])->name('getStudent')->middleware('forbidden');
    Route::get('getSubject', [SubjectExamStudentController::class, 'getSubject'])->name('getSubject')->middleware('forbidden');
    Route::get('exportSubjectExamStudent', [SubjectExamStudentController::class, 'exportSubjectExamStudent'])->name('exportSubjectExamStudent')->middleware('forbidden');
    Route::post('importSubjectExamStudent', [SubjectExamStudentController::class, 'importSubjectExamStudent'])->name('importSubjectExamStudent')->middleware('forbidden');
    Route::get('printSubjectExamStudent/{id?}', [SubjectExamStudentController::class, 'printSubjectExamStudent'])->name('printSubjectExamStudent');
    #### Element ####
    Route::resource('elements', ElementController::class)->middleware('forbidden');

    #### process Degrees ####
    Route::resource('process_degrees', ProcessDegreeController::class)->middleware('forbidden');
    Route::get('get_doctor', [ProcessDegreeController::class, 'getDoctor'])->name('getDoctor')->middleware('forbidden');

    #### Subject Exam Student Result ####
    Route::resource('subject_exam_student_result', SubjectExamStudentResultController::class)->middleware('forbidden');
    Route::get('exam_result/all', [\App\Http\Controllers\Student\SubjectExamStudentResultController::class, 'index'])->name('exam_result.all');
    Route::get('exportSubjectExamStudentResult', [SubjectExamStudentResultController::class, 'exportSubjectExamStudentResult'])->name('exportSubjectExamStudentResult')->middleware('forbidden');
    Route::post('importSubjectExamStudentResult', [SubjectExamStudentResultController::class, 'importSubjectExamStudentResult'])->name('importSubjectExamStudentResult')->middleware('forbidden');

    #### document types ####
    Route::resource('document_types', DocumentTypeController::class)->middleware('forbidden');
    Route::post('document_types.delete', [DocumentTypeController::class, 'delete'])->name('document_types.delete')->middleware('forbidden');


    #### documents ####
    Route::resource('documents', DocumentController::class)->except(['edit', 'update', 'show']);
    Route::post('documents.delete', [DocumentController::class, 'delete'])->name('documents.delete')->middleware('forbidden');
    Route::post('documents/processing', [DocumentController::class, 'processing'])->name('documents.processing')->middleware('forbidden');
    Route::get('documents/student', [DocumentController::class, 'documentsStudent'])->name('documents.student');


    #### Process Exam ####
    Route::resource('process_exams', ProcessExamController::class);
    Route::get('process_examss/students/{id}', [ProcessExamController::class, 'processExamStudent'])->name('processExamStudent');
    Route::post('updateRequestStatus/', [ProcessExamController::class, 'updateRequestStatus'])->name('updateRequestStatus');


    #### Element ####
    Route::resource('elements', ElementController::class)->middleware('forbidden');

    #### Process Degrees ####
    Route::resource('process_degrees', ProcessDegreeController::class)->except('show');
    Route::get('process_degreess/students', [ProcessDegreeController::class, 'processDegreeStudent'])->name('processDegreeStudent');
    Route::post('RequestStatusDegree/', [ProcessDegreeController::class, 'RequestStatusDegree'])->name('RequestStatusDegree')->middleware('forbidden');
    Route::get('/updateDegree_edit/{id}', [ProcessDegreeController::class, 'editUpdateDegree'])->name('editUpdateDegree')->middleware('forbidden');
    Route::post('updateDegree', [ProcessDegreeController::class, 'updateDegree'])->name('updateDegree')->middleware('forbidden');

    #### Subject Exam Student Result ####
    Route::resource('subject_exam_student_result', SubjectExamStudentResultController::class);


    #### certificates ####
    Route::resource('certificates', CertificateController::class);
    Route::get('certificate/registeration', [CertificateController::class, 'registeration'])->name('certificates.registeration');
    Route::post('certificates.delete', [CertificateController::class, 'delete'])->name('certificates.delete');
    Route::post('certificates/processing', [CertificateController::class, 'processing'])->name('certificates.processing');

    Route::get('exportCertificate', [CertificateController::class, 'exportCertificate'])->name('exportCertificate');
    Route::post('importCertificate', [CertificateController::class, 'importCertificate'])->name('importCertificate');


    #### Event ####
    Route::resource('events', EventController::class)->middleware('forbidden');

    #### schedules ####
    Route::resource('schedules', ScheduleController::class)->middleware('forbidden');
    Route::get('schedules-of-students', [\App\Http\Controllers\Student\ScheduleController::class, 'allSchedules'])->name('schedules.students.all');
    Route::post('schedules/delete', [ScheduleController::class, 'delete'])->name('schedules.delete')->middleware('forbidden');


    #### periods ####
    Route::group(['middleware' => 'forbidden'], function () {
        Route::resource('periods', PeriodController::class)->only(['index', 'create', 'store']);
        Route::post('period/status', [PeriodController::class, 'status'])->name('period.status');
    });

    #### subject of doctor ####
    Route::get('subject', [\App\Http\Controllers\Doctor\SubjectController::class, 'index'])->name('dashboard.subject')->middleware('forbidden');

    #### Reasons for redress ####
    Route::resource('reasons_redress', ReasonRedresseController::class)->middleware('forbidden');

    #### Certificate Name ####
    Route::resource('certificate_name', CertificateTypeController::class)->middleware('forbidden');


    #### Point Statement ####
    Route::resource('points', PointStatementController::class)->middleware('forbidden');
    Route::get('exportPointStatement', [PointStatementController::class, 'exportPointStatement'])->name('exportPointStatement')->middleware('forbidden');
    Route::post('importPointStatement', [PointStatementController::class, 'importPointStatement'])->name('importPointStatement')->middleware('forbidden');

    #### Re Record The Track ####
    Route::get('reregisterForm', [ReRecordTheTrackController::class, 'reregisterForm'])->name('reregisterForm');
    Route::post('reregisterFormStore', [ReRecordTheTrackController::class, 'reregisterFormStore'])->name('reregisterFormStore');;

});


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth', 'forbidden']], function () {

    Route::get('get-subject-by-branch/{department_branch_id}/{group_id}', [HomeController::class, 'getSubjectByBranch']);
    Route::get('allSubjectsByFilterData', [SubjectExamStudentController::class, 'allSubjects']);
    Route::get('allStudentsBySubjectId', [SubjectExamStudentController::class, 'allStudents']);

});
