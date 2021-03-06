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

    //Exam Type
    Route::get('/examType/examTypeView','Setup\ExamTypeController@view');
    Route::get('/examType/getData','Setup\ExamTypeController@getData');
    Route::post('/examType/deleteData','Setup\ExamTypeController@deleteData');
    Route::post('/examType/getDetails','Setup\ExamTypeController@getDetails');
    Route::post('/examType/updateData','Setup\ExamTypeController@updateData');
    Route::post('/examType/insertData','Setup\ExamTypeController@insertData');

    //Fee Amount
    Route::get('/amount/amountView','Setup\FeeAmountController@view')->name('fee_view');
    Route::get('/amount/amountAdd','Setup\FeeAmountController@add');
    Route::get('/amount/amountEdit/{fee_category_id}','Setup\FeeAmountController@edit')->name('fee_edit');
    Route::get('/amount/amountDetails/{fee_category_id}','Setup\FeeAmountController@details')->name('fee_details');
    Route::get('/amount/getData','Setup\FeeAmountController@getData');
    Route::post('/amount/deleteData','Setup\FeeAmountController@deleteData');
    Route::post('/amount/updateData/{fee_category_id}','Setup\FeeAmountController@updateData')->name('fee_update');
    Route::post('/amount/insertData','Setup\FeeAmountController@insertData');

    //Subject
    Route::get('/subject/subjectView','Setup\SubjectController@view');
    Route::get('/subject/getData','Setup\SubjectController@getData');
    Route::post('/subject/deleteData','Setup\SubjectController@deleteData');
    Route::post('/subject/getDetails','Setup\SubjectController@getDetails');
    Route::post('/subject/updateData','Setup\SubjectController@updateData');
    Route::post('/subject/insertData','Setup\SubjectController@insertData');

    //Assign Subject
    Route::get('/assignsubject/assignsubjectView','Setup\AssignSubjectController@view')->name('assignsubject_view');
    Route::get('/assignsubject/aassignsubjectAdd','Setup\AssignSubjectController@add');
    Route::get('/assignsubject/assignsubjectEdit/{class_id}','Setup\AssignSubjectController@edit')->name('assignsubject_edit');
    Route::get('/assignsubject/assignsubjectDetails/{class_id}','Setup\AssignSubjectController@details')->name('assignsubject_details');
   // Route::get('/assignsubject/getData','Setup\AssignSubjectController@getData');
    Route::post('/assignsubject/deleteData','Setup\AssignSubjectController@deleteData');
    Route::post('/assignsubject/updateData/{class_id}','Setup\AssignSubjectController@updateData')->name('assignsubject_update');
    Route::post('/assignsubject/insertData','Setup\AssignSubjectController@insertData');


    //Designation
    Route::get('/designation/designationView','Setup\DesignationController@view');
    Route::get('/designation/getData','Setup\DesignationController@getData');
    Route::post('/designation/deleteData','Setup\DesignationController@deleteData');
    Route::post('/designation/getDetails','Setup\DesignationController@getDetails');
    Route::post('/designation/updateData','Setup\DesignationController@updateData');
    Route::post('/designation/insertData','Setup\DesignationController@insertData');

});


Route::group(['prefix'=>'/students'],function (){


//USER
    Route::get('/user/userView','Students\UserController@view');
    Route::get('/user/getData','Students\UserController@getData');
    Route::post('/user/deleteData','Students\UserController@deleteData');
    Route::post('/user/getDetails','Students\UserController@getDetails');
    Route::post('/user/updateData','Students\UserController@updateData');
    Route::post('/user/insertData','Students\UserController@insertData');


//Student Registartion
//    Route::get('/student/studentView','Students\StudentRegController@view');
//    Route::get('/student/getData','Students\StudentRegController@getData');
//    Route::post('/student/deleteData','Students\StudentRegController@deleteData');
//    Route::post('/student/getDetails','Students\StudentRegController@getDetails');
//    Route::post('/student/updateData','Students\StudentRegController@updateData');
//    Route::post('/student/insertData','Students\StudentRegController@insertData');

    Route::get('/student/studentView','Students\StudentRegController@view')->name('student_view');
    Route::get('/student/studentAdd','Students\StudentRegController@add');
    Route::get('/student/studentEdit/{student_id}','Students\StudentRegController@edit')->name('student_edit');

    Route::get('/student/studentPromotion/{student_id}','Students\StudentRegController@promotion')->name('student_promotion');
    Route::post('/student/studentPromotion/{student_id}','Students\StudentRegController@promotionStore')->name('students_promotionStore');

    Route::get('/student/studentDetails/{student_id}','Students\StudentRegController@details')->name('student_details');

    Route::post('/student/deleteData','Students\StudentRegController@deleteData');
    Route::get('/student/yearClassWise','Students\StudentRegController@yearClassWise')->name('students_search');
    Route::post('/student/updateData/{student_id}','Students\StudentRegController@updateData')->name('students_update');
    Route::post('/student/insertData','Students\StudentRegController@insertData')->name('students_insert');


    //Roll Generate
    Route::get('/roll/view','Students\StudentRollController@view')->name('roll_view');

    Route::get('/roll/getStudent','Students\StudentRollController@getStudent')->name('roll_getStudent');

    Route::post('/roll/insertData','Students\StudentRollController@insertData')->name('roll_insert');

    //Registration Fee
    Route::get('/regFee/view','Students\RegistrationFeeController@view')->name('regFee_view');
    Route::get('/regFee/getStudent','Students\RegistrationFeeController@getStudent')->name('regFee_getStudent');
    Route::get('/regFee/paySlip','Students\RegistrationFeeController@paySlip')->name('regFee_payslip');


    //Monthly Fee
    Route::get('/monthly/view','Students\MonthlyFeeController@view')->name('monthly_view');
    Route::get('/monthly/getStudent','Students\MonthlyFeeController@getStudent')->name('monthly_getStudent');
    Route::get('/monthly/paySlip','Students\MonthlyFeeController@paySlip')->name('monthly_payslip');


    //Exam Fee
    Route::get('/examFee/view','Students\ExamFeeController@view')->name('examFee_view');
    Route::get('/examFee/getStudent','Students\ExamFeeController@getStudent')->name('examFee_getStudent');
    Route::get('/examFee/paySlip','Students\ExamFeeController@paySlip')->name('examFee_payslip');
});

Route::group(['prefix'=>'/employee'],function (){


//Employee Registration
    Route::get('/reg/view','Employee\EmployeeRegController@view')->name('employee_view');
    Route::get('/reg/employeeAdd','Employee\EmployeeRegController@add')->name('employee_add');;
    Route::get('/reg/employeeEdit/{id}','Employee\EmployeeRegController@edit')->name('employee_edit');
    Route::post('/reg/updateData/{id}','Employee\EmployeeRegController@updateData')->name('employee_update');
    Route::post('/reg/insertData','Employee\EmployeeRegController@insertData')->name('employee_insert');
    Route::get('/reg/details/{id}','Employee\EmployeeRegController@details')->name('employee_details');

//Employee Salary
    Route::get('/salary/view','Employee\EmployeeSalaryController@view')->name('employee_salary_view');

    Route::get('/salary/salaryIncrement/{id}','Employee\EmployeeSalaryController@increment')->name('employee_salary_increment');
    Route::post('/salary/store/{id}','Employee\EmployeeSalaryController@store')->name('employee_salary_store');

    Route::get('/salary/details/{id}','Employee\EmployeeSalaryController@details')->name('employee_salary_details');


    //Employee leave
    Route::get('/leave/view','Employee\EmployeeLeaveController@view')->name('employee_leave_view');
    Route::get('/leave/employeeAdd','Employee\EmployeeLeaveController@add')->name('employee_leave_add');;
    Route::get('/leave/employeeEdit/{id}','Employee\EmployeeLeaveController@edit')->name('employee_leave_edit');
    Route::post('/leave/updateData/{id}','Employee\EmployeeLeaveController@updateData')->name('employee_leave_update');
    Route::post('/leave/insertData','Employee\EmployeeLeaveController@insertData')->name('employee_leave_insert');


    //Employee Attendence
    Route::get('/attend/view','Employee\EmployeeAttendanceController@view')->name('employee_attend_view');
    Route::get('/attend/employeeAdd','Employee\EmployeeAttendanceController@add')->name('employee_attend_add');;
    Route::get('/attend/employeeEdit/{date}','Employee\EmployeeAttendanceController@edit')->name('employee_attend_edit');
    Route::post('/attend/updateData/{id}','Employee\EmployeeAttendanceController@updateData')->name('employee_attend_update');
    Route::post('/attend/insertData','Employee\EmployeeAttendanceController@insertData')->name('employee_attend_insert');
    Route::get('/attend/details/{date}','Employee\EmployeeAttendanceController@details')->name('employee_attend_details');
});
