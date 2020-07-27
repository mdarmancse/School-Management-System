<?php

namespace App\Http\Controllers\Setup;

use App\Http\Controllers\Controller;

use App\Model\StudentClassModel;
use App\Model\AssignSubjectModel;
use App\Model\SubjectModel;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    function view(){
        $AllData=AssignSubjectModel::select('class_id')->groupBy('class_id')->get();

        return view('setup.student_class.ViewAssignSubject',['AllData'=>$AllData]);


    }
    function add(){


        $data['subjects']=SubjectModel::all();
        $data['classes']=StudentClassModel::all();

        return view('setup.student_class.AddAssignSubject',$data);

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


        return view('setup.student_class.DetailsFeeAmount',$data);
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


        $countSubject=count($request->subject_id);

        if($countSubject != NULL){
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

        return redirect()->route('assignsubject_view')->with('success','Data inserted successfully');
    }

}
