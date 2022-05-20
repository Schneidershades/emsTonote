<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'admin', 'namespace' => 'Api'], function(){
    Route::resource('/admin', 'AdminController');
    Route::resource('/benefits', 'BenefitController');
    Route::resource('/departments', 'DepartmentController');
    Route::resource('/designations', 'DesignationController');
    Route::resource('/employees', 'EmployeeController');
    Route::resource('/leave', 'LeaveController');
    Route::resource('/leave-requests', 'LeaveRequestController');
    Route::resource('/payslip', 'PayslipController');
});

Route::group(['middleware' => 'employee', 'namespace' => 'Api'], function(){
    Route::resource('/dashboard', 'DashboardController@store');
});