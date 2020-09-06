<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeave extends Model
{
    public function user(){
        return $this->belongsTo(UserModel::class,'employee_id','id');
    }

    public function purpose(){
        return $this->belongsTo(LeavePurpose::class,'leave_purpose_id','id');
    }
}
