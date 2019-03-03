<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/','loginController@login');

Auth::routes();

// -------------------------------------------------------------------------------------------------
// home settings url
// -------------------------------------------------------------------------------------------------
Route::get('/', 'HomeController@index')->name('home');



// -------------------------------------------------------------------------------------------------
//  previledge settings url
// -------------------------------------------------------------------------------------------------
Route::get('/previledge/superAdmin', 'previledgeController@superAdmin')->name('previledge');
Route::post('/previledge/superAdmin', 'previledgeController@superAdminsave')->name('previledge');



// -------------------------------------------------------------------------------------------------
//  department settings url
// -------------------------------------------------------------------------------------------------
Route::get('/department', 'departmentController@index')->name('departmentList');


// -------------------------------------------------------------------------------------------------
//  employee settings url
// -------------------------------------------------------------------------------------------------
// Route::get('/create_menu', 'mainMenuController@menu')->name('createmainMenu');
Route::get('/employee_management/employee_list', 'employeeController@index')->name('employeelist');
Route::get('/employee_management/employee_add', 'employeeController@add')->name('addemployee');
Route::post('/employee_management/employee_save', 'employeeController@save');
Route::get('/employee_management/employee_edit/{id}', 'employeeController@edit');
Route::post('/employee_management/employee_edit', 'employeeController@update');
Route::get('/employee_management/employee_delete/{id}', 'employeeController@delete');
Route::get('/findDesignationName', 'employeeController@findDesignation');


//employee contracts info
//---------------------------------------------------------------------------------------------------
Route::get('/employee_management/employee_contracts_list', 'employeeContractsController@index')->name('employeeContractsList');
Route::get('/employee_management/add_employee_contracts', 'employeeContractsController@add')->name('addEmployeeContracts');
Route::post('/employee_management/add_employee_contracts', 'employeeContractsController@save');
Route::get('/employee_management/employee_contracts_edit/{id}', 'employeeContractsController@edit');
Route::post('/employee_management/employee_contracts_edit', 'employeeContractsController@update');
Route::get('/employee_management/employee_contracts_delete/{id}', 'employeeContractsController@delete');



// -------------------------------------------------------------------------------------------------
//  task management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/task_management/task_list','taskController@index')->name('tasklist');
Route::get('/task_management/task_add','taskController@add')->name('taskadd');
Route::post('/task_management/task_save','taskController@save');
Route::get('/task_management/task_status_edit/{id}','taskController@taskStatusEdit');

// -------------------------------------------------------------------------------------------------
//  leave management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/leave_management/leave_type','leaveTypeController@index')->name('leavetype');
Route::post('/leave_management/leave_type','leaveTypeController@add_field');
Route::get('/leave_management/leave_request','leaveController@index')->name('leaverequest');

