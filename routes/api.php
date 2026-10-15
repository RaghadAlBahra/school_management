<?php

use App\Http\Controllers\SchoolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

route::get('students',[SchoolController::class,'index']);



route::get('teachers',[SchoolController::class,'index1']);


route::get('teachers/{id}',[SchoolController::class,'getTeacherCourses']);

route::get('courses/{id}',[SchoolController::class,'getCourseStudents']);
route::post('courses/{id}/teacher',[SchoolController::class,'attachTeacherCourses']);
route::post('courses/{id}',[SchoolController::class,'syncStudentsCourses']);
