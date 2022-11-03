<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\EmployeecreateController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    return view('backend.welcome');
});




//backend

 Route::get('/dashboards',[DashboardController::class,'dashboards']);
 Route::get('/employee',[employeeController::class,'employee']);
 Route::get('/employeecreate',[employeeController::class,'employeecreate'])->name('employee.create');
 Route::post('/emc',[employeeController::class,'emc'])->name('emc.create');
 Route::get('/attendance',[AttendanceController::class,'attendance']);
 Route::get('/leave',[leaveController::class,'leave']);
 Route::get('/projects',[ProjectsController::class,'projects']);
 Route::get('/salary',[SalaryController::class,'salary']);
 Route::get('/department',[DepartmentController::class,'department']);
 Route::get('/departmentcreate',[DepartmentController::class,'departmentcreate'])->name('department.create');
 Route::post('/department/form',[DepartmentController::class,'dpt'])->name('department.form');;

 Route::get('/designation',[DesignationController::class,'designation']);
 Route::post('/dsg',[DesignationController::class,'dsg']);
 Route::post('/leve',[leaveController::class,'leve']);
 



