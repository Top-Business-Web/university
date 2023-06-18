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
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\SelectionController;
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
use App\Http\Controllers\Admin\SubjectExamStudentResultController;
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


Route::get('/login', [LoginController::class, 'index'])->name('admin.login');

Route::post('/do-login', [LoginController::class, 'login'])->name('login');

Route::group([
    'prefix' => '/dashboard',
    'middleware' => ['auth']
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('admin.home');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    #### Admins ####
    Route::resource('admins', AdminController::class)->except(['show']);
    Route::post('admins.delete', [AdminController::class, 'delete'])->name('admins.delete');
    Route::get('profile', [AdminController::class, 'profile'])->name('profile');

    Route::resource('selections',SelectionController::class);

});
