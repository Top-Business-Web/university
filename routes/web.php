<?php

use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\DeanSpeechController;
use App\Http\Controllers\Front\EventController;
use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Front\PresentationController;
use App\Http\Controllers\Front\HomeWebController;
use App\Http\Controllers\Front\PageController;
use App\Http\Controllers\Front\TimeUsesController;

//--------------------------------------------------------------------------
// Web routes
//--------------------------------------------------------------------------
// start web routes

Route::get('/',[WebController::class,'index'])->name('web.index');











//--------------------------------------------------------------------------
// Admin routes
//--------------------------------------------------------------------------

require __DIR__ . '/admin.php';
