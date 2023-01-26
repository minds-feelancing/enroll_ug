<?php

use App\Http\Controllers\SchoolCategoryController;
use App\Http\Controllers\SchoolController;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'],function(){
    Route::get('/categories',[SchoolCategoryController::class , "schoolCategories"])->name('api.categories.index');
    Route::get('/schools',[SchoolController::class , "schools"])->name('api.schools.index');
    Route::get('/schools/{school}/staff',[SchoolController::class , "staff"])->name('api.staff.index');


});