<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\VisitorModel;
use App\ReviewModel;
use App\ContactModel;

class HomeController extends Controller
{
       //ADMIN
    function HomeIndexAdmin(){

       $TotalVisitors= VisitorModel::count();

        $TotalReviews= ReviewModel::count();
        $TotalContact= ContactModel::count();

        return view('Home',[

            'TotalVisitors'=>$TotalVisitors,
            'TotalReviews'=>$TotalReviews,
            'TotalContact'=>$TotalContact


        ]);
    }

}
