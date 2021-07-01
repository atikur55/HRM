<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// # Removed for optimization #
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware('auth:api')->get('/user', 'UserController@AuthRouteAPI');
//Shaun file and payslip  get api
Route::get('fileview','ApiController@fileview');
Route::get('allemp/{id}','ApiController@allemp');
Route::get('empfileview/{id}','ApiController@empfileview');
Route::get('/emp_payroll_download/{payroll_id}','Personal\PersonalPayrollController@emp_payroll_download');
Route::get('filedownload/{file}','ApiController@filedownload');
Route::get('payrollview','ApiController@payrollview');
Route::post('fileupload','ApiController@fileupload');


//Saadman file
Route::get('active','ApiController@index');
Route::get('count','ApiController@attendanceCount');


Route::get('empdata2','ApiController@employeeData2');
Route::get('empdata','ApiController@employeeData');

Route::get('empsingle/{id}','ApiController@empSingle');

Route::get('attendance','ApiController@attendance');

Route::get('schedule','ApiController@schedule');

Route::get('payroll','ApiController@payroll');

Route::get('leave','ApiController@leave');

Route::get('expense_graph_year','ApiController@ExpenseGraphYear');

Route::get('expense_graph/{yr}','ApiController@expenseGraph');

// client contact
Route::get('client/message/{client_id}', 'ApiController@contact');
Route::post('client/store_contact', 'ApiController@storeContact');

//client  project
Route::get('client/project/{client_id}', 'ApiController@project');



/*admin  client message*/
Route::get('client_message', 'ApiController@clientMessage');
Route::get('client_message/delete/{id}', 'ClientController@clientMessageDelete');
/* admin registered client project*/

Route::get('registered_client_project', 'ClientController@registeredClientProject');

Route::post('registered_client_project_store', 'ClientController@registeredClientProjectStore');

Route::get('registered_client_project_status/{id}', 'ClientController@registeredClientProjectStatus');


Route::get('registered_client_project/delete/{id}', 'ClientController@registeredClientProjectDelete');


/* clock */
Route::get('clock/{idno}/{type}', 'ApiController@clockAdd');



/* Passport */

Route::get('token','PassportController@createToken');

Route::post('login','PassportController@login');

Route::post('register','PassportController@register');



Route::middleware('auth:api')->group(function (){
    Route::get('details','PassportController@details');
    Route::get('logout', 'PassportController@logout');


    // Route::resource('employees','')
});
