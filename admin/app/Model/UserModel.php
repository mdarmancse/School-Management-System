<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    public function designation(){
        return $this->belongsTo(DesignationModel::class,'designation_id','id');
    }
}
