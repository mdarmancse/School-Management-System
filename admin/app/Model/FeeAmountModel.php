<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeeAmountModel extends Model
{
    public function fee_category(){

        return $this->belongsTo(FeeCategoryModel::class,'fee_category_id','id');
    }

    public function student_class(){

        return $this->belongsTo(StudentClassModel::class,'class_id','id');
    }
}
