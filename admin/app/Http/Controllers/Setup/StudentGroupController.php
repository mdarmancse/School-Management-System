<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentGroupModel;
use Illuminate\Http\Request;

class StudentGroupController extends Controller
{
    function view(){

        return view('setup.student_class.ViewGroup');

    }

    function getData(){

        $result=StudentGroupModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= StudentGroupModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=StudentGroupModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $group=$request->input('group');


        $result=StudentGroupModel::where('id',$id)->update([
            'group'=>$group
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $group=$request->input('group');;

        $result=StudentGroupModel::insert([
            'group'=>$group

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }

}
