<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectModel extends Model
{
    public function class_name(){

        return $this->belongsTo(StudentClassModel::class,'class_id','id');
    }

    public function student_subject(){

        return $this->belongsTo(SubjectModel::class,'subject_id','id');
    }
}
