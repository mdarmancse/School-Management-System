<?php

use Illuminate\Support\Facades\Route;



//Route::get('/add', function () {
//    return view('admin.Home');
//});


Route::get('/','HomeController@HomeIndexAdmin')->middleware('logincheck');
Route::get('/visitor','VisitorController@VisitorIndex')->middleware('logincheck');


//Contact Management
Route::get('/messeges', 'ContactController@ContactIndex')->middleware('logincheck');
Route::get('/getContactData','ContactController@getContactData')->middleware('logincheck');
Route::post('/ContactDelete', 'ContactController@ContactDelete')->middleware('logincheck');


//Reviews Management

Route::get('/reviews', 'ReviewController@ReviewIndex')->middleware('logincheck');
Route::get('/getReviewsData', 'ReviewController@getReviewsData')->middleware('logincheck');
Route::post('/reviewDelete', 'ReviewController@reviewDelete')->middleware('logincheck');
Route::post('/reviewDetails', 'ReviewController@reviewDetails')->middleware('logincheck');
Route::post('/reviewUpdate', 'ReviewController@reviewUpdate')->middleware('logincheck');
Route::post('/reviewAdd', 'ReviewController@reviewAdd')->middleware('logincheck');

//Login

Route::get('/LoginIndex', 'LoginController@LoginIndex');
Route::get('/onLogout', 'LoginController@onLogout');
Route::post('/onLogin', 'LoginController@onLogin');



//Student Setup

Route::group(['prefix'=>'setups'],function (){
    //Class
    Route::get('/class/classView','Setup\StudentClasscontroller@view');
    Route::get('/class/getData','Setup\StudentClasscontroller@getData');
    Route::post('/class/deleteData','Setup\StudentClasscontroller@deleteData');
    Route::post('/class/getDetails','Setup\StudentClasscontroller@getDetails');
    Route::post('/class/updateData','Setup\StudentClasscontroller@updateData');
    Route::post('/class/insertData','Setup\StudentClasscontroller@insertData');

    //Year
    Route::get('/year/yearView','Setup\StudentYearController@view');
    Route::get('/year/getData','Setup\StudentYearController@getData');
    Route::post('/year/deleteData','Setup\StudentYearController@deleteData');
    Route::post('/year/getDetails','Setup\StudentYearController@getDetails');
    Route::post('/year/updateData','Setup\StudentYearController@updateData');
    Route::post('/year/insertData','Setup\StudentYearController@insertData');

    //group
    Route::get('/group/groupView','Setup\StudentGroupController@view');
    Route::get('/group/getData','Setup\StudentGroupController@getData');
    Route::post('/group/deleteData','Setup\StudentGroupController@deleteData');
    Route::post('/group/getDetails','Setup\StudentGroupController@getDetails');
    Route::post('/group/updateData','Setup\StudentGroupController@updateData');
    Route::post('/group/insertData','Setup\StudentGroupController@insertData');

    //Shift
    Route::get('/shift/shiftView','Setup\StudentShiftController@view');
    Route::get('/shift/getData','Setup\StudentShiftController@getData');
    Route::post('/shift/deleteData','Setup\StudentShiftController@deleteData');
    Route::post('/shift/getDetails','Setup\StudentShiftController@getDetails');
    Route::post('/shift/updateData','Setup\StudentShiftController@updateData');
    Route::post('/shift/insertData','Setup\StudentShiftController@insertData');

    //Fee Category
    Route::get('/feeCat/feeCatView','Setup\FeeCategoryController@view');
    Route::get('/feeCat/getData','Setup\FeeCategoryController@getData');
    Route::post('/feeCat/deleteData','Setup\FeeCategoryController@deleteData');
    Route::post('/feeCat/getDetails','Setup\FeeCategoryController@getDetails');
    Route::post('/feeCat/updateData','Setup\FeeCategoryController@updateData');
    Route::post('/feeCat/insertData','Setup\FeeCategoryController@insertData');

    //Fee Amount
    Route::get('/amount/amountView','Setup\FeeAmountController@view');
    Route::get('/amount/getData','Setup\FeeAmountController@getData');
    Route::post('/amount/deleteData','Setup\FeeAmountController@deleteData');
    Route::post('/amount/getDetails','Setup\FeeAmountController@getDetails');
    Route::post('/amount/updateData','Setup\FeeAmountController@updateData');
    Route::post('/amount/insertData','Setup\FeeAmountController@insertData');
});


