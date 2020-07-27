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
        $AmountData=FeeAmountModel::select('fee_category_id')->groupBy('fee_category_id')->get();

        return view('setup.student_class.ViewFeeAmount',['AmountData'=>$AmountData]);


    }
    function add(){

//        $data['feeCat']=FeeCategoryModel::all();
//        $data['classes']=StudentClassModel::all();

        $data['fee_categories']=FeeCategoryModel::all();
        $data['classes']=StudentClassModel::all();

        return view('setup.student_class.AddFeeAmount',$data);

    }

    function edit($fee_category_id){

        $data['editData']=FeeAmountModel::where('fee_category_id',$fee_category_id)->orderBy("class_id","asc")->get();
        $data['fee_categories']=FeeCategoryModel::all();
        $data['classes']=StudentClassModel::all();

        return view('setup.student_class.EditFeeAmount',$data);

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


    function details(Request $req,$fee_category_id){
        $data['editData']=FeeAmountModel::where('fee_category_id',$fee_category_id)->orderBy("class_id","asc")->get();


        return view('setup.student_class.DetailsFeeAmount',$data);
    }

    function updateData(Request $request,$fee_category_id){

        if($request->class_id==NULL){
        return redirect()->back()->with('error','Sorry! you do not select any item');

        }else{
            FeeAmountModel::where('fee_category_id',$fee_category_id)->delete();
            $countClass=count($request->class_id);
            for($i=0;$i<$countClass;$i++){

                $feeAmount=new FeeAmountModel();
                $feeAmount->fee_category_id=$request->fee_category_id;
                $feeAmount->class_id=$request->class_id[$i];
                $feeAmount->amount=$request->amount[$i];
                $feeAmount->save();
            }

        }
        return redirect()->route('fee_view')->with('success',"Data updated succesfully");
    }


    function insertData(Request $request){


    $countClass=count($request->class_id);

    if($countClass != NULL){
            for($i=0;$i<$countClass;$i++){

                $feeAmount=new FeeAmountModel();
                $feeAmount->fee_category_id=$request->fee_category_id;
                $feeAmount->class_id=$request->class_id[$i];
                $feeAmount->amount=$request->amount[$i];
                $feeAmount->save();
            }

    }

    return redirect()->route('fee_view')->with('success','Data inserted successfully');
    }


}
