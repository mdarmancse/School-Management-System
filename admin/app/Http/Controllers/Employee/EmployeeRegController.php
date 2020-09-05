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

class EmployeeRegController extends Controller
{
    function view(){

    $data['allData']=UserModel::where('userType','employee')->get();
      return view('employee.employeeReg.ViewEmployee',$data);


    }

    function add(){

        $data['designation']=DesignationModel::all();

        return view('employee.employeeReg.AddEmployee',$data);

    }

    function edit($id){
        $data['editData']=UserModel::find($id);
        $data['designation']=DesignationModel::all();

        return view('employee.employeeReg.AddEmployee',$data);

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


        $user=UserModel::find($id);
        $user->name=$request->name;
        $user->fatherName=$request->fatherName;
        $user->motherName=$request->motherName;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->address=$request->address;
        $user->gender=$request->gender;
        $user->religion=$request->religion;
        $user->designation_id=$request->designation_id;
        $user->dob=date('Y-m-d',strtotime($request->dob));
        if ($request->file('image')){
            $file=$request->file('image');
            @unlink(public_path('uploads/employee_images/'.$user->image));
            $fileName=date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('uploads/employee_images'),$fileName);
            $user['image']=$fileName;
        }
        $user->save();






        return redirect()->route('employee_view')->with('success','Data inserted successfully');
    }

    function insertData(Request $request){

        DB::transaction(function () use($request){
            $checkYear=date('Ym',strtotime($request->join_date));
            $employee=UserModel::where('userType','employee')->orderBy('id','desc')->first();

            if($employee==null){
                $firstReg=0;
                $employee_id=$firstReg+1;

                if($employee_id<10){
                    $id_no='000'.$employee_id;
                }else if($employee_id<100){
                    $id_no='00'.$employee_id;
                }else if($employee_id<1000){
                    $id_no='0'.$employee_id;
                }


            }else{
                $employee=UserModel::where('userType','employee')->orderBy('id','desc')->first()->id;
                $employee_id=$employee+1;

                if($employee_id<10){
                    $id_no='000'.$employee_id;
                }else if($employee_id<100){
                    $id_no='00'.$employee_id;
                }else if($employee_id<1000){
                    $id_no='0'.$employee_id;
                }
            }
//KAj continue kor,bakita porey solve korey divo error gole bye taholey

//              $final_id=$checkYear.$id_no;

            $user=new UserModel();
            $code=rand(0000,9999);
            $user->id_no="1";
            $user->password=bcrypt($code);
            $user->userType='Employee';
            $user->code=$code;
            $user->name=$request->name;
            $user->fatherName=$request->fatherName;
            $user->motherName=$request->motherName;
            $user->email=$request->email;
            $user->mobile=$request->mobile;
            $user->address=$request->address;
            $user->gender=$request->gender;
            $user->religion=$request->religion;
            $user->salary=$request->salary;
            $user->designation_id=$request->designation_id;
            $user->dob=date('Y-m-d',strtotime($request->dob));
            $user->join_date=date('Y-m-d',strtotime($request->join_date));
            if ($request->file('image')){
                $file=$request->file('image');
                $fileName=date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('uploads/employee_images'),$fileName);
                $user['image']=$fileName;
            }
            $user->save();

            $employee_salary=new EmployeeSalaryLog();
            $employee_salary->employee_id=$user->id;
            $employee_salary->effected_date=date('Y-m-d',strtotime($request->join_date));
            $employee_salary->previous_salary=$request->salary;
            $employee_salary->present_salary=$request->salary;
            $employee_salary->increment_salary='0';
            $employee_salary->save();
        });

        return redirect()->route('employee_view')->with('success','Data inserted successfully');
    }


    public function details($id){
        $data['details']=UserModel::find($id);
      //  $data['designation']=DesignationModel::all();
        $pdf = PDF::loadView('employee.employeeReg.EmployeeDetailsPdf', $data);
        $pdf->SetProtection(['copy','print'],'','pass');
        return $pdf->stream('document.pdf');



    }

}
