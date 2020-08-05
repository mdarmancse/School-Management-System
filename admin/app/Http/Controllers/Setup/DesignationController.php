<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\DesignationModel;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    function view(){

        return view('setup.student_class.Designation');

    }

    function getData(){

        $result=DesignationModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= DesignationModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=DesignationModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $designation=$request->input('designation');


        $result=DesignationModel::where('id',$id)->update([
            'designation'=>$designation
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $designation=$request->input('designation');;

        $result=DesignationModel::insert([
            'designation'=>$designation

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
