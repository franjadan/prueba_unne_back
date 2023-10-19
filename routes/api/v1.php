<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\v1\{StudyController, SubjectController, TeacherController, SubjectTeacherController};
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('requestLogger')->group(function () {
    Route::prefix('v1')->group(function () {
        Route::resource('studies', StudyController::class);

        Route::get('studies/{id}/subjects', [SubjectController::class, 'getByStudy']);

        Route::resource('teachers', TeacherController::class)->only('index');

        Route::resource('subjects-with-teachers', SubjectTeacherController::class)->only('index');
    });
});
