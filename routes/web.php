<?php

use App\Http\Controllers\Admin\CoreController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SchoolCategoryController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SchoolFormQuestionController;
use App\Http\Controllers\SchoolStaffController;
use App\Http\Controllers\SchoolApplicationController;
use App\Models\School;
use App\Http\Controllers\WizardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[CoreController::class,"home"])->name("home");
Route::get("/login",[CoreController::class,"login"])->name("login");
Route::get("/school/login",[SchoolStaffController::class , 'login'])->name('school.login');
Route::post("authenticate",[CoreController::class,"authenticate"])->name('authenticate');
Route::get("/Searched/school/{id}",[CoreController::class,"searchSchool"])->name('searched_school');
Route::post("/All_Schools",[CoreController::class,"schoolNameCheck"]);
Route::get('/check-login-status', [CoreController::class,"checkLoginStatus"]);
Route::post("school/authenticate",[SchoolStaffController::class,"authenticate"])->name('school.authenticate');
Route::get("/Sign_Up",[CoreController::class,"SignUp"])->name('form.store');
Route::post("/confirm_password",[CoreController::class,"confirmPassword"]);
Route::post("/email/check",[CoreController::class,"checkEmail"]);



Route::group(['middleware'=>'auth'],function(){
    Route::get("/dashboard",[CoreController::class,"index"])->name("dashboard");
    Route::post("/logout",[CoreController::class,"logout"])->name("logout");
    Route::get("/settings",[CoreController::class,"settings"])->name("settings");
    Route::get("/applications",[CoreController::class,"applications"])->name("applications");
    Route::get("/logs",[CoreController::class,"logs"])->name("logs");
    Route::get("/support",[CoreController::class,"support"])->name("support");
    




    Route::resource('categories',SchoolCategoryController::class);
    Route::resource('schools',SchoolController::class);
    Route::post("/sections",[SchoolFormQuestionController::class,"section_create"])->name("sections.store");
    Route::delete("/sections/{section}",[SchoolFormQuestionController::class,"section_destroy"])->name("sections.destroy");

    Route::resource("/questions",SchoolFormQuestionController::class)->except('index');
    Route::resource("schools/{school}/staff",SchoolStaffController::class);

    Route::get('/schools/{school}/form',[SchoolController::class,"form"])->name('schools.form');
    Route::get("/payments",[PaymentController::class , "index"])->name('payments.index');

});


Route::get("/school/dashboard",[SchoolStaffController::class , 'dashboard'])->name('school.dashboard')->middleware('school');
Route::get("/school/applications",[SchoolStaffController::class , 'applications'])->name('school.applications')->middleware('school');
Route::get("/school/transfers",[SchoolStaffController::class , 'transfers'])->name('school.transfers')->middleware('school');
Route::get("/school/settings",[SchoolStaffController::class , 'settings'])->name('school.settings')->middleware('school');



Route::get("/SignUp/Step1",[WizardController::class , 'SignUpStep1'])->name('register');
Route::post("/step2/store",[WizardController::class , 'step2Store']);
Route::get("/start/application/{id}",[SchoolApplicationController::class , 'create'])->name('start.application');