<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\ExamTypeModel;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    function view(){

        return view('setup.student_class.ExamType');

    }

    function getData(){

        $result=ExamTypeModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= ExamTypeModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=ExamTypeModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $examType=$request->input('examType');


        $result=ExamTypeModel::where('id',$id)->update([
            'examType'=>$examType
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $examType=$request->input('examType');;

        $result=ExamTypeModel::insert([
            'examType'=>$examType

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
