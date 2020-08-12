<?php

namespace App\Http\Controllers;

use App\Model\UserModel;
use Illuminate\Http\Request;
use App\Http\Middleware\LoginCheckMiddleware;

class LoginController extends Controller
{
    function LoginIndex(){
        return view('Login');

    }
    function onLogout(Request $request){
        $request->session()->flush();
        return redirect('/LoginIndex');


    }


    function onLogin(Request $request){
        $email= $request->input('email');
        $pass= $request->input('pass');
        $countValue=UserModel::where('email','=',$email)->where('password','=',$pass)->count();

        if($countValue==1){
            $request->session()->put('email',$email);
            return 1;
        }
        else{
            return 0;
        }

    }
}
