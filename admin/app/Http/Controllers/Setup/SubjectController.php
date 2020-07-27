<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\SubjectModel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    function view(){

        return view('setup.student_class.Subject');

    }

    function getData(){

        $result=SubjectModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= SubjectModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=SubjectModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $subject=$request->input('subject');


        $result=SubjectModel::where('id',$id)->update([
            'subject'=>$subject
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $subject=$request->input('subject');;

        $result=SubjectModel::insert([
            'subject'=>$subject

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
