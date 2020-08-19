<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\FeeAmountModel;
use App\Model\StudentClassModel;
use App\Model\StudentYearModel;
use PDF;
use Illuminate\Http\Request;

class RegistrationFeeController extends Controller
{
    function view(){

        $AllData['year']=StudentYearModel::orderBy('year','desc')->get();

        $AllData['classes']=StudentClassModel::all();
        return view('student.studentReg.ViewRegFee',$AllData);


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
        $html['thsource'].='<th>Registration Fee</th>';
        $html['thsource'].='<th>Discount Amount</th>';
        $html['thsource'].='<th>Fee(This Student)</th>';
        $html['thsource'].='<th>Action</th>';


        foreach ($allstudent as $key => $v){

                $registartionFee=FeeAmountModel::where('fee_category_id','1')->where('class_id',$v->class_id)->first();
                $color='success';
                $html[$key]['tdsource']='<td>'.($key+1).'</td>';
                $html[$key]['tdsource'].='<td>'.$v['student']['id_no'].'</td>';
                $html[$key]['tdsource'].='<td>'.$v['student']['name'].'</td>';
                $html[$key]['tdsource'].='<td>'.$v->roll.'</td>';
                $html[$key]['tdsource'].='<td>'.$registartionFee->amount.'Tk'.'</td>';
                 $html[$key]['tdsource'].='<td>'.$v['discount']['discount'].'%'.'</td>';


                 $originalFee=$registartionFee->amount;
                 $discount=$v['discount']['discount'];
                 $discountableFee=$discount/100*$originalFee;
                 $finalFee=(float)$originalFee-(float)$discountableFee;


            $html[$key]['tdsource'].='<td>'.$finalFee.'Tk'.'</td>';
            $html[$key]['tdsource'].='<td>';
            $html[$key]['tdsource'].='<a class="btn btn-sm btn-'.$color.'" title="Payslip" target="_blank" href="'.route("regFee_payslip").'?class_id='.$v->class_id.'&student_id='.$v->student_id.'">Pay Slip</a>';
            $html[$key]['tdsource'].='</td>';
        }

        return response()->json(@$html);

    }

    function paySlip(Request $request){
        $class_id=$request->class_id;
        $student_id=$request->student_id;
        $allstudent['details']=AssignStudent::with(['discount','student'])->where('student_id',$student_id)->where('class_id',$class_id)->first();
        $pdf = PDF::loadView('student.studentReg.RegistrationSlipPdf', $allstudent);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');
    }
}
