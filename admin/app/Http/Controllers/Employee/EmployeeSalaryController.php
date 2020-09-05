<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentClassModel;
use App\Model\StudentGroupModel;
use App\Model\StudentShiftModel;
use App\Model\StudentYearModel;
use App\Model\UserModel;
use App\Model\EmployeeSalaryLog;
use App\Model\DesignationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class EmployeeSalaryController extends Controller
{
    function view(){

        $data['allData']=UserModel::where('userType','employee')->get();
        return view('employee.employeeSalary.ViewEmployeeSalary',$data);


    }



    function increment($id){
        $data['editData']=UserModel::find($id);

        return view('employee.employeeSalary.AddEmployeeSalary',$data);

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

    public function store(Request $request,$id)
    {
        $user = UserModel::find($id);
        $previous_salary=$user->salary;
        $present_salary=(float)$previous_salary + (float)$request ->increment_salary;
        $user->salary = $present_salary;
        $user->save();
        $salaryData=new EmployeeSalaryLog();
        $salaryData->employee_id=$id;
        $salaryData->previous_salary=$previous_salary;
        $salaryData ->increment_salary=$request->increment_salary;
        $salaryData->present_salary=$present_salary;
        $salaryData->effected_date= date('Y-m-d',strtotime($request->effected_date));
        $salaryData->save();

        return redirect()->route('employee_salary_view')->with('success','Data inserted successfully');

}

    public function details($id){
        $data['details']=UserModel::find($id);
        $data['salary_log']=EmployeeSalaryLog::where('employee_id',$data['details']->id)->get();

        return view('employee.employeeSalary.DetailsEmployeeSalary',$data);



    }
}
