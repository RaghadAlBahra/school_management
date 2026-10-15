<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourses;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SchoolController extends Controller
{


    public function index(){
       return Student::with(['user','courses'])->get();
    }

    public function index1(){
       return Teacher::with(['user','courses'])->get();
    }

    public function getTeacherCourses($id){
        $teacher = Teacher::with('courses')->findOrFail($id);
        return response()->json($teacher->courses, 200);
    }

    public function getCourseStudents($id){
        $course = Course::with('students.user')->findOrFail($id);
        return response()->json($course->students, 200);
    }

    public function attachTeacherCourses(StoreCourses $request ,$id){
        $teacher = Teacher::findOrFail($id);
        $data =$request->all();

        if (isset($data['name'])) {
        return $teacher->courses()->create($data);
    }
        return $teacher->courses()->createMany($data);
    }

    public function syncStudentsCourses(StoreCourses $request ,$id){
        $course = Course::findOrfail($id);
        $course->students()->sync($request->input('student_id'));
        return response()->json($course->students, 200);
}
}
