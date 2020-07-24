<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentShiftModel;
use Illuminate\Http\Request;

class StudentShiftController extends Controller
{
    function view(){

        return view('setup.student_class.ViewShift');

    }

    function getData(){

        $result=StudentShiftModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= StudentShiftModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=StudentShiftModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $shift=$request->input('shift');


        $result=StudentShiftModel::where('id',$id)->update([
            'shift'=>$shift
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $shift=$request->input('shift');;

        $result=StudentShiftModel::insert([
            'shift'=>$shift

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
