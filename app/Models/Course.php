<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['name'])]
class Course extends Model
{
     public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
    
    public function students(){
        return $this->belongsToMany(Student::class,'course_student');
    }
}
