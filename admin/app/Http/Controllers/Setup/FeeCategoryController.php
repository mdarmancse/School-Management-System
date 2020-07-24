<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\FeeCategoryModel;
use Illuminate\Http\Request;

class FeeCategoryController extends Controller
{
    function view(){

        return view('setup.student_class.ViewFee');

    }

    function getData(){

        $result=FeeCategoryModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= FeeCategoryModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=FeeCategoryModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $feeCat=$request->input('feeCat');


        $result=FeeCategoryModel::where('id',$id)->update([
            'feeCat'=>$feeCat
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){



        $feeCat=$request->input('feeCat');;

        $result=FeeCategoryModel::insert([
            'feeCat'=>$feeCat

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }
}
