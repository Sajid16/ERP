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
Route::post('/employee_management/employee_contracts_update', 'employeeContractsController@update');
Route::get('/employee_management/employee_contracts_delete/{id}', 'employeeContractsController@delete');



// -------------------------------------------------------------------------------------------------
//  task management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/task_management/task_list','taskController@index')->name('tasklist');
Route::get('/task_management/task_add','taskController@add')->name('taskadd');
Route::post('/task_management/task_save','taskController@save');
Route::get('/task_management/task_edit/{id}','taskController@taskEdit');
Route::post('/task_management/task_update','taskController@update');
Route::get('/task_management/task_delete/{id}', 'taskController@taskListDelete');
Route::get('/task_management/individual_task','taskController@individualTask')->name('individualTask');
Route::get('/task_management/individual_task_edit/{id}','taskController@individualTaskEdit');
Route::post('/task_management/individual_task_update','taskController@taskStatusUpdate');

// -------------------------------------------------------------------------------------------------
//  leave management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/leave_management/leave_type','leaveTypeController@index')->name('leavetype');
Route::post('/leave_management/leave_type','leaveTypeController@add_field');
Route::get('/leave_management/leave_request','leaveController@index')->name('leaverequest');
Route::post('/leave_management/leave_request_send','leaveController@sendRequest');
Route::get('/leave_management/leave_request_review','leaveController@reviewRequest')->name('reviewRequest');
Route::get('/leave_management/individual_leave_request_view','leaveController@individualViewRequest')->name('individualViewRequest');
Route::get('/leave_management/leave_request_review_status/{id}/{email}','leaveController@reviewRequestStatus');
Route::post('/leave_management/leave_status_update','leaveController@reviewRequestStatusUpdate');

// -------------------------------------------------------------------------------------------------
//  training management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/training_management/training_topics','trainingTopicsController@index')->name('trainingTopics');
Route::post('/training_management/training_topics','trainingTopicsController@add_field');
Route::get('/training_management/my_training','trainingController@index')->name('myTraining');
Route::get('/training_management/team_training','trainingController@teamTraining')->name('teamTraining');
Route::get('/training_management/training_request','trainingController@requestTraining')->name('requestTraining');
Route::post('/training_management/training_request_save','trainingController@trainingRequestSave');
Route::get('/training_management/all_training_request','trainingController@allrequestTraining')->name('alltrainingrequest');
Route::get('/training_management/all_training_request_view/{id}','trainingController@allrequestTrainingView');
Route::post('/training_management/all_training_request_check','trainingController@trainingRequestCheck');
Route::get('/training_management/employee_training_request_view/{id}','trainingController@employeetrainingView');
Route::post('/training_management/employee_training_request_confirmation','trainingController@employeetrainingConfirmation');
Route::post('/training_management/save_feedback','trainingController@saveFeedback');

// -------------------------------------------------------------------------------------------------
//  profile management settings url
// -------------------------------------------------------------------------------------------------

Route::get('/profile_management/profile','profileController@index')->name('userProfile');