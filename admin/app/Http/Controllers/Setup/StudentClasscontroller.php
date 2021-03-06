<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\StudentClassModel;

class StudentClasscontroller extends Controller
{
    function view(){

        return view('setup.student_class.ViewClass');

    }

    function getData(){

        $result=StudentClassModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= StudentClassModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=StudentClassModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $name=$request->input('name');


        $result=StudentClassModel::where('id',$id)->update([
            'name'=>$name
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $name=$request->input('name');;

        $result=StudentClassModel::insert([
            'name'=>$name

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


}
