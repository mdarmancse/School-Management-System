<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\FeeAmountModel;
use App\Model\StudentClassModel;
use App\Model\StudentYearModel;
use Illuminate\Http\Request;
use PDF;;

class MonthlyFeeController extends Controller
{
    function view(){

        $AllData['year']=StudentYearModel::orderBy('year','desc')->get();

        $AllData['classes']=StudentClassModel::all();
        return view('student.monthlyFee.ViewMonthlyFee',$AllData);


    }

    function getStudent(Request $request){
        $year_id=$request->year_id;
        $class_id=$request->class_id;

        if($year_id!=''){

            $where[]=['year_id','like',$year_id.'%'];

        }
        if($class_id!=''){

            $where[]=['class_id','like',$class_id.'%'];

        }

        $allstudent=AssignStudent::with(['discount'])->where($where)->get();

        $html['thsource']='<th>SL</th>';
        $html['thsource'].='<th>ID NO</th>';
        $html['thsource'].='<th>Student Name</th>';
        $html['thsource'].='<th>Roll Number</th>';
        $html['thsource'].='<th>Monthly Fee</th>';
        $html['thsource'].='<th>Discount Amount</th>';
        $html['thsource'].='<th>Fee(This Student)</th>';
        $html['thsource'].='<th>Action</th>';


        foreach ($allstudent as $key => $v){

            $monthlyFee=FeeAmountModel::where('fee_category_id','3')->where('class_id',$v->class_id)->first();
            $color='success';
            $html[$key]['tdsource']='<td>'.($key+1).'</td>';
            $html[$key]['tdsource'].='<td>'.$v['student']['id_no'].'</td>';
            $html[$key]['tdsource'].='<td>'.$v['student']['name'].'</td>';
            $html[$key]['tdsource'].='<td>'.$v->roll.'</td>';
            $html[$key]['tdsource'].='<td>'.$monthlyFee->amount.'Tk'.'</td>';
            $html[$key]['tdsource'].='<td>'.$v['discount']['discount'].'%'.'</td>';


            $originalFee=$monthlyFee->amount;
            $discount=$v['discount']['discount'];
            $discountableFee=$discount/100*$originalFee;
            $finalFee=(float)$originalFee-(float)$discountableFee;


            $html[$key]['tdsource'].='<td>'.$finalFee.'Tk'.'</td>';
            $html[$key]['tdsource'].='<td>';
            $html[$key]['tdsource'].='<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("monthly_payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'&month='.$request->month.'">Pay Slip</a>';
            $html[$key]['tdsource'].='</td>';
        }

        return response()->json(@$html);

    }

    function paySlip(Request $request){
        $class_id=$request->class_id;
        $student_id=$request->student_id;
        $data['month']=$request->month;

        $data['details']=AssignStudent::with(['discount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
        $pdf = PDF::loadView('student.monthlyFee.MonthlySlipPdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
}
