<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobTitleController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\LeaveController;


Route::get('/', function () {
    return view('welcome');
});
Route::resource('attendances', AttendanceController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);
Route::resource('job_titles', JobTitleController::class);
Route::resource('salaries', SalaryController::class);
Route::resource('leaves', LeaveController::class);


