<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\UserModel;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentYearModel;
use App\Model\StudentClassModel;
use App\Model\StudentShiftModel;
use App\Model\StudentGroupModel;
use Illuminate\Support\Facades\DB;
use PDF;

class StudentRollController extends Controller
{

    function view(){

        $AllData['year']=StudentYearModel::orderBy('year','desc')->get();

        $AllData['classes']=StudentClassModel::all();

        return view('student.rollGenerate.RollGenerate',$AllData);


    }

    function getStudent(Request $request){
        $allData=AssignStudent::with(['student'])->where('year_id',$request->year_id)->where('class_id',$request->class_id)->get();
     return response()->json($allData);
    }

    function insertData(Request $request){

        $year_id=$request->year_id;
        $class_id=$request->class_id;

        if($request->student_id!=null){
            for($i=0;$i<count($request->student_id);$i++){
                AssignStudent::where('year_id',$year_id)->where('class_id',$class_id)->where('student_id',$request->student_id[$i])->update(
                    ['roll'=>$request->roll[$i]]
                );
            }
        }else{
        return redirect()->back()->with('error'.'Sorry! There are no student');
        }
        return redirect()->route('roll_view')->with('success','Successfully roll genereted');

    }

}
