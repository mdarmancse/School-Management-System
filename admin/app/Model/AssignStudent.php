<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AssignStudent extends Model
{
   public function student(){

       return $this->belongsTo(UserModel::class,'student_id','id');

    }
    public function student_class(){

        return $this->belongsTo(StudentClassModel::class,'class_id','id');
    }
    public function year(){

        return $this->belongsTo(StudentYearModel::class,'year_id','id');
    }

    public function discount(){

        return $this->belongsTo(DiscountStudent::class,'id','assign_student_id');
    }
}
