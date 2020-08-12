<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use App\Model\AssignStudent;
use App\Model\DiscountStudent;
use App\Model\StudentYearModel;
use App\Model\StudentClassModel;
use App\Model\StudentShiftModel;
use App\Model\StudentGroupModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentRegController extends Controller
{
    function view(){

        $AllData['year']=StudentYearModel::orderBy('year','desc')->get();
        $AllData['year_id']=StudentYearModel::orderBy('id','desc')->first()->id;
        $AllData['classes']=StudentClassModel::all();
        $AllData['class_id']=StudentClassModel::orderBy('id','asc')->first()->id;
        $AllData['AllData']=AssignStudent::where('year_id',  $AllData['year_id'])->where('class_id', $AllData['class_id'])->get();
        return view('student.studentReg.ViewStudent',$AllData);


    }

    function yearClassWise(Request $request){

        $AllData['year']=StudentYearModel::orderBy('year','desc')->get();
        $AllData['year_id']=$request->year_id;
        $AllData['classes']=StudentClassModel::all();
        $AllData['class_id']=$request->class_id;
        $AllData['AllData']=AssignStudent::where('year_id',$request->year_id  )->where('class_id', $AllData['class_id'])->get();
        return view('student.studentReg.ViewStudent',$AllData);


    }
    function add(){


        $data['group']=StudentGroupModel::all();
        $data['shift']=StudentShiftModel::all();
        $data['year']=StudentYearModel::all();
        $data['classes']=StudentClassModel::all();

        return view('student.studentReg.AddStudent',$data);

    }

    function edit($class_id){

        $data['editData']=AssignSubjectModel::where('class_id',$class_id)->orderBy("subject_id","asc")->get();
        $data['subjects']=SubjectModel::all();
        $data['classes']=StudentClassModel::all();


        return view('setup.student_class.EditAssignSubject',$data);

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


    function details(Request $req,$class_id){
        $data['editData']=AssignSubjectModel::where('class_id',$class_id)->orderBy("subject_id","asc")->get();


        return view('setup.student_class.DetailsSubjectMark',$data);
    }

    function updateData(Request $request,$class_id){

        if($request->class_id==NULL){
            return redirect()->back()->with('error','Sorry! you do not select any item');

        }else{
            AssignSubjectModel::where('class_id',$class_id)->delete();
            $countSubject=count($request->subject_id);
            for($i=0;$i<$countSubject;$i++){

                $assignSubject=new AssignSubjectModel();
                $assignSubject->class_id=$request->class_id;
                $assignSubject->subject_id=$request->subject_id[$i];
                $assignSubject->full_mark=$request->full_mark[$i];
                $assignSubject->pass_mark=$request->pass_mark[$i];
                $assignSubject->get_mark=$request->get_mark[$i];
                $assignSubject->save();
            }


        }
        return redirect()->route('assignsubject_view')->with('success',"Data updated succesfully");
    }


    function insertData(Request $request){

            DB::transaction(function () use($request){
                $checkYear=StudentYearModel::find($request->year_id)->year;
                $student=UserModel::where('userType','student')->orderBy('id','desc')->first();

                if($student==null){
                    $firstReg=0;
                    $student_id=$firstReg+1;

                    if($student_id<10){
                            $id_no='000'.$student_id;
                    }else if($student_id<100){
                        $id_no='00'.$student_id;
                    }else if($student_id<1000){
                        $id_no='0'.$student_id;
                    }


                }else{
                    $student=UserModel::where('userType','student')->orderBy('id','desc')->first()->id;
                    $student_id=$student+1;

                    if($student_id<10){
                        $id_no='000'.$student_id;
                    }else if($student_id<100){
                        $id_no='00'.$student_id;
                    }else if($student_id<1000){
                        $id_no='0'.$student_id;
                    }
                }
//KAj continue kor,bakita porey solve korey divo error gole bye taholey

//                $final_id=$checkYear.$id_no;

                $user=new UserModel();
                $code=rand(0000,9999);
                $user->id_no="1";
                $user->password=bcrypt($code);
                $user->userType='Student';
                $user->code=$code;
                $user->name=$request->name;
                $user->fatherName=$request->fatherName;
                $user->motherName=$request->motherName;
                $user->email=$request->email;
                $user->mobile=$request->mobile;
                $user->address=$request->address;
                $user->gender=$request->gender;
                $user->dob=date('Y-m-d',strtotime($request->dob));
               if ($request->file('image')){
                   $file=$request->file('image');
                    $fileName=date('YmdHi').$file->getClientOriginalName();
                    $file->move(public_path('uploads/students_images'),$fileName);
                    $user['image']=$fileName;
               }
                $user->save();

            $assign_student=new AssignStudent();
            $assign_student->student_id=$user->id;
            $assign_student->year_id=$request->year_id;
            $assign_student->class_id=$request->class_id;
            $assign_student->group_id=$request->group_id;
            $assign_student->shift_id=$request->shift_id;
            $assign_student->save();

            $discount_student=new DiscountStudent();
                $discount_student->assign_student_id=$assign_student->id;
                $discount_student->fee_category_id="1";
                $discount_student->discount=$request->discount;
                $discount_student->save();

            });





        return redirect()->route('student_view')->with('success','Data inserted successfully');
    }


}
