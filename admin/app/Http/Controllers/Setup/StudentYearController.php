<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentYearModel;
use Illuminate\Http\Request;

class StudentYearController extends Controller
{
    function view(){

        return view('setup.student_class.ViewYear');

    }

    function getData(){

        $result=StudentYearModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= StudentYearModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=StudentYearModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $year=$request->input('year');


        $result=StudentYearModel::where('id',$id)->update([
            'year'=>$year
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $year=$request->input('year');;

        $result=StudentYearModel::insert([
            'year'=>$year

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


}
