<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Model\UserModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function view(){

        return view('user.user');

    }

    function getData(){

        $result=UserModel::take(10)->get();
        return $result;

    }

    function deleteData(Request $request){
        $id=$request->input('id');

        $result= UserModel::where('id',$id)->delete();

        if($result==true){

            return 1;
        }else{

            return 0;
        }


    }


    function getDetails(Request $req){
        $id= $req->input('id');
        $result=UserModel::where('id','=',$id)->get();
        return $result;
    }

    function updateData(Request $request){

        $id=$request->input('id');
        $role=$request->input('role');
        $name=$request->input('name');
        $email=$request->input('email');

        $result=UserModel::where('id',$id)->update([


            'role'=>$role,
            'name'=>$name,
            'email'=>$email,

        ]);

        if ($result==true){
            return 1;
        }else{
            return 0;
        }
    }



    function delete(Request $request)
    {
        $id = $request->input('id');
        $result = UserModel::where('id', $id)->delete();
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function details(Request $request)
    {
        $id = $request->id;
        $result = AdminModel::where('id', $id)->get();
        return $result;
    }

    function update(Request $request)
    {

        $id = $request->input('id');
        $role = $request->input('role');
        $name = $request->input('name');
        $email = $request->input('email');

        $result = UserModel::where('id', $id)->update([
            'role' => $role,
            'name' => $name,
            'email' => $email,
        ]);
        if ($result == true) {
            return 1;
        } else {
            return 0;
        }
    }

    function insertData(Request $request)
    {
        $role = $request->input('role');
        $name = $request->input('name');
        $email = $request->input('email');
//        $pass = $request->input('pass');
        $code=rand(0000,9999);
        $result = UserModel::insert([

            'usertype' => 'Admin',
            'role' => $role,
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($code),
            'code'=>$code
        ]);

        if ($result == true) {
            return 1;
        } else {
            return 0;
        }

    }


}

