<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;
use App\Model\StudentClassModel;
use App\Model\FeeCategoryModel;
use App\Model\FeeAmountModel;
use Illuminate\Http\Request;

class FeeAmountController extends Controller
{
    function view(){

        return view('setup.student_class.ViewFeeAmount');

    }

    function getData(){

        $result=FeeAmountModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= FeeAmountModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=FeeAmountModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $fee_category_id=$request->input('fee_category_id');
        $class_id=$request->input('class_id');
        $amount=$request->input('amount');



        $result=FeeAmountModel::where('id',$id)->update([
            'fee_category_id'=>$fee_category_id,
            'class_id'=>$class_id,
            'amount'=>$amount
        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


    function insertData(Request $request){


        $fee_category_id=$request->input('fee_category_id');
        $class_id=$request->input('class_id');
        $amount=$request->input('amount');


        $result=FeeAmountModel::insert([
            'fee_category_id'=>$fee_category_id,
            'class_id'=>$class_id,
            'amount'=>$amount

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }


}
