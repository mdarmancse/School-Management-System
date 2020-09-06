<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
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

class EmployeeLeaveController extends Controller
{
    function view(){

        $data['allData']=EmployeeLeave::all();
        return view('employee.employeeLeave.ViewEmployeeLeave',$data);


    }

    function add(){
        $data['employee']=UserModel::where('userType','Employee')->get();
        $data['leavePurpose']=LeavePurpose::all();

        return view('employee.employeeLeave.AddEmployeeLeave',$data);

    }

    function edit($id){
        $data['editData']=EmployeeLeave::find($id);
        $data['employee']=UserModel::where('userType','Employee')->get();
        $data['leavePurpose']=LeavePurpose::all();


        return view('employee.employeeLeave.AddEmployeeLeave',$data);

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

    function updateData(Request $request,$id){

        if($request->leave_purpose_id==0){
            $leavePurpose=new LeavePurpose();
            $leavePurpose->name=$request->name;
            $leavePurpose->save();
            $leavePurposeID=$leavePurpose->id;
        }else{
            $leavePurposeID=$request->leave_purpose_id;
        }
        $employeeLeave= EmployeeLeave::find($id);
        $employeeLeave->employee_id=$request->employee_id;
        $employeeLeave->start_date=date('Y-m-d',strtotime($request->start_date));
        $employeeLeave->end_date=date('Y-m-d',strtotime($request->end_date));
        $employeeLeave->leave_purpose_id=$leavePurposeID;
        $employeeLeave->save();


        return redirect()->route('employee_leave_view')->with('success','Data inserted successfully');
    }

    function insertData(Request $request){

            if($request->leave_purpose_id==0){
                $leavePurpose=new LeavePurpose();
                $leavePurpose->name=$request->name;
                $leavePurpose->save();
                $leavePurposeID=$leavePurpose->id;
            }else{
                $leavePurposeID=$request->leave_purpose_id;
            }
            $employeeLeave=new EmployeeLeave();
            $employeeLeave->employee_id=$request->employee_id;
            $employeeLeave->start_date=date('Y-m-d',strtotime($request->start_date));
            $employeeLeave->end_date=date('Y-m-d',strtotime($request->end_date));
            $employeeLeave->leave_purpose_id=$leavePurposeID;
            $employeeLeave->save();


        return redirect()->route('employee_leave_view')->with('success','Data inserted successfully');
    }


    public function details($id){
        $data['details']=UserModel::find($id);
        //  $data['designation']=DesignationModel::all();
        $pdf = PDF::loadView('employee.employeeReg.EmployeeDetailsPdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');



    }
}
