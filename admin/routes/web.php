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

Route::prefix('setups')->group(function (){

    Route::get('/student/class/view','Setup\StudentClasscontroller@view');

});
