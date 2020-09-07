<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\EmployeeAttendance;
use App\Model\StudentClassModel;
use App\Model\StudentGroupModel;
use App\Model\StudentShiftModel;
use App\Model\StudentYearModel;
use App\Model\LeavePurpose;
use App\Model\EmployeeLeave;
use App\Model\UserModel;
use App\Model\EmployeeSalaryLog;
use App\Model\DesignationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class EmployeeAttendanceController extends Controller
{
    function view(){

        $data['allData']=EmployeeAttendance::select('date')->groupBy('date')->orderBy('id','desc')->get();
        return view('employee.employeeAttendance.ViewEmployeeAttend',$data);


    }

    function add(){
        $data['employee']=UserModel::where('userType','Employee')->get();


        return view('employee.employeeAttendance.AddEmployeeAttend',$data);

    }

    function edit($date){
        $data['editData']=EmployeeAttendance::where('date',$date)->get();
        $data['employee']=UserModel::where('userType','Employee')->get();

        return view('employee.employeeAttendance.AddEmployeeAttend',$data);

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


    function insertData(Request $request){
        EmployeeAttendance::where('date',date('d-m-Y',strtotime($request->date)))->delete();

        $countEmployee=count($request->employee_id);
        for($i=0;$i<$countEmployee;$i++){
        $attend_status='attend_status'.$i;
        $attend=new EmployeeAttendance();
        $attend->date=date('Y-m-d',strtotime($request->date));
        $attend->employee_id=$request->employee_id[$i];
        $attend->attend_status=$request->$attend_status;
        $attend->save();

        }

        return redirect()->route('employee_attend_view')->with('success','Data save successfully');
    }


    public function details($date){
        $data['details']=EmployeeAttendance::where('date',$date)->get();

        return view('employee.employeeAttendance.DetailsEmployeeAttend',$data);



    }
}
