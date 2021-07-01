	<?php
	/*
	* Workday - A time clock application for employees
	* Email: official.codefactor@gmail.com
	* Version: 1.1
	* Author: Brian Luna
	* Copyright 2020 Codefactor
	*/

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
	use App\Http\Controllers\EmpReg;
	use App\Http\Controllers\ThemeController;
	use App\Http\Controllers\PayrollController;

	Route::get('/corktest',function(){
		return view('layouts.master');
	});

	Route::get('/employee-registration',function(){
		return view('auth.register');
	});

	Route::post('emp/reg',  [EmpReg::class, 'register']);


	Route::get('theme',  [ThemeController::class, 'theme']);






	// Route::post('emp/reg','EmpReg@add');

	Route::group(['middleware' => 'auth'], function () {

		Route::group(['middleware' => 'checkstatus'], function () {
			/*
			|--------------------------------------------------------------------------
			| Universal SmartClock
			|--------------------------------------------------------------------------
			*/
			Route::get('clock', 'ClockController@clock');
			Route::post('attendance/add', 'ClockController@add');


			Route::group(['middleware' => 'admin'], function () {
				/*
				|--------------------------------------------------------------------------
				| Dashboard
				|--------------------------------------------------------------------------
				*/
				Route::get('/', 'Admin\DashboardController@index');
				Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');

				/* graph ajax data */
				Route::get('graph-ajax-data/{yr}','Admin\DashboardController@graphAjaxData');

				/*
				|--------------------------------------------------------------------------
				| Employees
				|--------------------------------------------------------------------------
				*/
				Route::get('employees', 'Admin\EmployeesController@index')->name('employees');
				Route::get('employees/new', 'Admin\EmployeesController@new');
				Route::post('employee/add',  'Admin\EmployeesController@add');
				Route::post('new_register_post',  'Admin\EmployeesController@new_register_post');
				Route::get('/employees/new/register','Admin\EmployeesController@new_register');


				/*
				|--------------------------------------------------------------------------
				| Payroll
				|--------------------------------------------------------------------------
				*/
				Route::get('payroll', 'PayrollController@index')->name('payroll');
				Route::get('listpayroll', 'PayrollController@listpayroll')->name('listpayroll');
				Route::get('payment/{id}', 'PayrollController@payment');
				Route::post('paymentstore/{id}','PayrollController@paymentstore');
				Route::get('paymentedit/{id}/{reference}','PayrollController@paymentedit');
				Route::get('paymentdelete/{id}','PayrollController@paymentdelete');
				Route::post('paymentupdate/{id}','PayrollController@paymentupdate');
				// Route::get('employees/new', 'Admin\EmployeesController@new');
				// Route::post('employee/add',  'Admin\EmployeesController@add');
				//Payroll update Created by Atikur Rahman
				Route::get('/payroll_download/{payroll_id}','PayrollController@payroll_download');


						/*
				|--------------------------------------------------------------------------
				| Expense
				|--------------------------------------------------------------------------
				*/
				Route::get('expense_category','ExpenseController@expense_category')->name('expense_category');
				Route::post('expense_category_store','ExpenseController@expense_category_store')->name('expense_category_store');

				Route::get('expense_category_delete/{id}','ExpenseController@expense_category_delete')->name('expense_category_delete');

				Route::get('expense','ExpenseController@index')->name('expense');
				Route::get('listexpense', 'ExpenseController@listexpense')->name('listexpense');
				Route::post('expensestore','ExpenseController@expensestore');
				// Route::get('payment/{id}', 'ExpenseController@payment');
				// Route::post('paymentstore/{id}','ExpenseController@paymentstore');
				Route::get('expenseedit/{id}','ExpenseController@expenseedit');
				Route::post('expenseupdate/{id}','ExpenseController@expenseupdate');
				Route::get('expensedelete/{id}','ExpenseController@expensedelete');
				// Route::get('employees/new', 'Admin\EmployeesController@new');
				// Route::post('employee/add',  'Admin\EmployeesController@add');

				Route::get('expensecatsearch', 'ExpenseController@expensecatsearch')->name('expensecatsearch');
				Route::get('expenseautocomplete', 'ExpenseController@expenseautocomplete')->name('expenseautocomplete');


				/*
				|--------------------------------------------------------------------------
				| Client
				|--------------------------------------------------------------------------
				*/

				Route::get('client_category_delete/{id}','ClientController@client_category_delete')->name('client_category_delete');
				Route::get('client','ClientController@index')->name('client');
				Route::get('client/new', 'ClientController@newclient');
				Route::post('clientstore','ClientController@clientstore');

				 /*registered client*/
				 Route::get('registered_client', 'ClientController@registeredClient');
				 Route::get('registered_client/delete/{id}', 'ClientController@registeredClientDelete');
				  /* client message*/
				  Route::get('client_message', 'ClientController@clientMessage');
				  Route::get('client_message/delete/{id}', 'ClientController@clientMessageDelete');
					/* registered client project*/

				Route::get('registered_client_project', 'ClientController@registeredClientProject');

				Route::post('registered_client_project_store', 'ClientController@registeredClientProjectStore');

				Route::get('registered_client_project_status/{id}', 'ClientController@registeredClientProjectStatus');


				Route::get('registered_client_project/delete/{id}', 'ClientController@registeredClientProjectDelete');

				Route::get('registered_client_project/edit/{id}', 'ClientController@registeredClientProjectEdit');

				Route::post('registered_client_project_update', 'ClientController@registeredClientProjectUpdate');





				// Route::get('payment/{id}', 'ClientController@payment');
				// Route::post('paymentstore/{id}','ClientController@paymentstore');
				Route::get('client/edit/{id}','ClientController@clientedit');
				Route::post('clientupdate/{id}','ClientController@clientupdate');
				Route::get('client/delete/{id}','ClientController@ClientDelete');
				// Route::get('employees/new', 'Admin\EmployeesController@new');
				// Route::post('employee/add',  'Admin\EmployeesController@add');

				Route::get('clientcatsearch', 'ClientController@clientcatsearch')->name('clientcatsearch');
				Route::get('ClientAutocomplete', 'ClientController@ClientAutocomplete')->name('ClientAutocomplete');


				/*
				|--------------------------------------------------------------------------
				| Employee Profile
				|--------------------------------------------------------------------------
				*/
				Route::get('profile/view/{id}', 'Admin\ProfileController@view');
				Route::get('profile/delete/{id}', 'Admin\ProfileController@delete');
				Route::post('profile/delete/employee', 'Admin\ProfileController@clear');
				Route::get('profile/archive/{id}', 'Admin\ProfileController@archive');

				// Profile Info
				Route::get('profile/edit/{id}', 'Admin\ProfileController@editPerson');
				Route::post('profile/update', 'Admin\ProfileController@updatePerson');


				/*
				|--------------------------------------------------------------------------
				| Employee Attendance
				|--------------------------------------------------------------------------
				*/
				Route::get('attendance', 'Admin\AttendanceController@index')->name('attendance');
				Route::get('attendance/edit/{id}', 'Admin\AttendanceController@edit');
				Route::get('attendance/delete/{id}', 'Admin\AttendanceController@delete');
				Route::post('attendance/update', 'Admin\AttendanceController@update');
				Route::post('attendance/add-entry', 'Admin\AttendanceController@addEntry');
				Route::get('attendance/filter', 'Admin\AttendanceController@getFilter');


				/*
				|--------------------------------------------------------------------------
				| Employee Schedules
				|--------------------------------------------------------------------------
				*/
				Route::get('schedules', 'Admin\SchedulesController@index')->name('schedule');
				Route::post('schedules/add', 'Admin\SchedulesController@add');
				Route::get('schedules/edit/{id}', 'Admin\SchedulesController@edit');
				Route::post('schedules/update', 'Admin\SchedulesController@update');
				Route::get('schedules/delete/{id}', 'Admin\SchedulesController@delete');
				Route::get('schedules/archive/{id}', 'Admin\SchedulesController@archive');


				/*
				|--------------------------------------------------------------------------
				| Employee Leaves
				|--------------------------------------------------------------------------
				*/
				Route::get('leaves', 'Admin\LeavesController@index')->name('leave');
				Route::get('leaves/edit/{id}', 'Admin\LeavesController@edit');
				Route::get('leaves/delete/{id}', 'Admin\LeavesController@delete');
				Route::post('leaves/update', 'Admin\LeavesController@update');


				/*
				|--------------------------------------------------------------------------
				| Users
				|--------------------------------------------------------------------------
				*/
				Route::get('users', 'Admin\UsersController@index')->name('users');
				Route::get('users/enable/{id}', 'Admin\UsersController@enable');
				Route::get('users/disable/{id}', 'Admin\UsersController@disable');
				Route::get('users/edit/{id}', 'Admin\UsersController@edit');
				Route::get('users/delete/{id}', 'Admin\UsersController@delete');
				Route::post('users/register', 'Admin\UsersController@register');
				Route::post('users/update/user', 'Admin\UsersController@update');


				/*
				|--------------------------------------------------------------------------
				| Employee Users & Roles
				|--------------------------------------------------------------------------
				*/
				Route::get('users/roles', 'Admin\RolesController@index')->name('roles');
				Route::post('users/roles/add', 'Admin\RolesController@add');
				Route::get('user/roles/get', 'Admin\RolesController@get');
				Route::post('users/roles/update', 'Admin\RolesController@update');
				Route::get('users/roles/delete/{id}', 'Admin\RolesController@delete');
				Route::get('users/roles/permissions/edit/{id}', 'Admin\RolesController@editperm');
				Route::post('users/roles/permissions/update', 'Admin\RolesController@updateperm');


				/*
				|--------------------------------------------------------------------------
				| Update User
				|--------------------------------------------------------------------------
				*/
				Route::get('update-profile', 'Admin\ProfileController@viewProfile')->name('updateProfile');
				Route::get('update-password', 'Admin\ProfileController@viewPassword')->name('updatePassword');
				Route::post('user/update-profile', 'Admin\ProfileController@updateUser');
				Route::post('user/update-password', 'Admin\ProfileController@updatePassword');


				/*
				|--------------------------------------------------------------------------
				| Reports
				|--------------------------------------------------------------------------
				*/
				Route::get('reports', 'Admin\ReportsController@index')->name('reports');
				Route::get('reports/employee-list', 'Admin\ReportsController@empList');
				Route::get('reports/employee-attendance', 'Admin\ReportsController@empAtten');
				Route::get('reports/individual-attendance', 'Admin\ReportsController@indiAtten');
				Route::get('reports/employee-leaves', 'Admin\ReportsController@empLeaves');
				Route::get('reports/individual-leaves', 'Admin\ReportsController@indiLeaves');
				Route::get('reports/employee-schedule', 'Admin\ReportsController@empSched');
				Route::get('reports/organization-profile', 'Admin\ReportsController@orgProfile');
				Route::get('reports/employee-birthdays', 'Admin\ReportsController@empBday');
				Route::get('reports/user-accounts', 'Admin\ReportsController@userAccs');
				Route::get('get/employee-attendance', 'Admin\ReportsController@getEmpAtten');
				Route::get('get/employee-leaves', 'Admin\ReportsController@getEmpLeav');
				Route::get('get/employee-schedules', 'Admin\ReportsController@getEmpSched');

				 /*
				|--------------------------------------------------------------------------
				| File Upload
				|--------------------------------------------------------------------------
				*/

				Route::get('fileupload', 'Admin\FileController@file');
				Route::get('fileview', 'Admin\FileController@fileview');
				Route::get('download/{file}', 'Admin\FileController@download');
				Route::get('delete/{id}', 'Admin\FileController@delete');
				Route::post('file-upload', 'Admin\FileController@fileUploadPost')->name('file.upload.post');

				/*
				|--------------------------------------------------------------------------
				| Settings
				|--------------------------------------------------------------------------
				*/
				Route::get('settings', 'Admin\SettingsController@index')->name('settings');
				Route::post('settings/update', 'Admin\SettingsController@update');
				Route::post('settings/reverse/activation', 'Admin\SettingsController@reverse');
				Route::get('settings/get/app/info', 'Admin\SettingsController@appInfo');


				/*
				|--------------------------------------------------------------------------
				| Application Shortcuts
				|--------------------------------------------------------------------------
				*/
				// Company
				Route::get('fields/company/', 'Admin\FieldsController@company')->name('company');
				Route::post('fields/company/add', 'Admin\FieldsController@addCompany');
				Route::get('fields/company/delete/{id}', 'Admin\FieldsController@deleteCompany');
				//Update - Atikur Rahman
				Route::get('/field/company/{company_name}','Admin\FieldsController@company_name');
				Route::get('/field_company_employee','Admin\FieldsController@field_company_employee');
				Route::get('/field_company_employer','Admin\FieldsController@field_company_employer');
				//End Update

				// Department
				Route::get('fields/department', 'Admin\FieldsController@department')->name('department');
				Route::post('fields/department/add', 'Admin\FieldsController@addDepartment');
				Route::get('fields/department/delete/{id}', 'Admin\FieldsController@deleteDepartment');

				// Job Title
				Route::get('fields/jobtitle', 'Admin\FieldsController@jobtitle')->name('jobtitle');
				Route::post('fields/jobtitle/add', 'Admin\FieldsController@addJobtitle');
				Route::get('fields/jobtitle/delete/{id}', 'Admin\FieldsController@deleteJobtitle');

				// Leave Types
				Route::get('fields/leavetype', 'Admin\FieldsController@leavetype')->name('leavetype');
				Route::post('fields/leavetype/add', 'Admin\FieldsController@addLeavetype');
				Route::get('fields/leavetype/delete/{id}', 'Admin\FieldsController@deleteLeavetype');
				Route::get('fields/leavetype/leave-groups',  'Admin\FieldsController@leaveGroups')->name('leavegroup');
				Route::post('fields/leavetype/leave-groups/add',  'Admin\FieldsController@addLeaveGroups');
				Route::get('fields/leavetype/leave-groups/edit/{id}',  'Admin\FieldsController@editLeaveGroups');
				Route::post('fields/leavetype/leave-groups/update',  'Admin\FieldsController@updateLeaveGroups');
				Route::get('fields/leavetype/leave-groups/delete/{id}',  'Admin\FieldsController@deleteLeaveGroups');


				/*
				|--------------------------------------------------------------------------
				| Exports : Employee data
				|--------------------------------------------------------------------------
				*/
				// export
				Route::get('export/fields/company', 'Admin\ExportsController@company');
				Route::get('export/fields/department', 'Admin\ExportsController@department');
				Route::get('export/fields/jobtitle', 'Admin\ExportsController@jobtitle');
				Route::get('export/fields/leavetypes', 'Admin\ExportsController@leavetypes');

				// import
				Route::post('import/fields/company', 'Admin\ImportsController@importCompany');
				Route::post('import/fields/department', 'Admin\ImportsController@importDepartment');
				Route::post('import/fields/jobtitle', 'Admin\ImportsController@importJobtitle');
				Route::post('import/fields/leavetypes', 'Admin\ImportsController@importLeavetypes');

				// import options
				Route::post('import/options', 'Admin\ImportsController@opt');

				// reports export
				Route::get('export/report/employees', 'Admin\ExportsController@employeeList');
				Route::post('export/report/attendance', 'Admin\ExportsController@attendanceReport');
				Route::post('export/report/leaves', 'Admin\ExportsController@leavesReport');
				Route::get('export/report/birthdays', 'Admin\ExportsController@birthdaysReport');
				Route::get('export/report/accounts', 'Admin\ExportsController@accountReport');
				Route::post('export/report/schedule', 'Admin\ExportsController@scheduleReport');



			/* === WORKSPACE === */
				Route::get('workspace','Projects\WorkspaceController@index')->name('workspace');
				Route::post('workspace/store','Projects\WorkspaceController@store');
				Route::post('workspace/update','Projects\WorkspaceController@update');
				Route::get('workspace/ajaxupdate','Projects\WorkspaceController@ajaxupdate')->name('workspace/ajaxupdate');
				Route::get('workspace/view/{id}','Projects\WorkspaceController@view');
				Route::get('workspace/delete/{id}','Projects\WorkspaceController@delete');

			/* === Projects ===*/

				Route::get('projects','Projects\ProjectController@project')->name('project');;
				Route::post('project/store/{id}','Projects\ProjectController@store');
				Route::get('project/ajaxupdate','Projects\ProjectController@ajaxupdate')->name('project/ajaxupdate');

				Route::get('project/ajaxstatusupdate','Projects\ProjectController@ajaxstatusupdate')->name('project/ajaxstatusupdate');

				Route::post('project/update','Projects\ProjectController@update');
				Route::get('workspace/view/{wid}/project/view/{pid}','Projects\ProjectController@view');
				Route::get('project/delete/{id}','Projects\ProjectController@delete');
				Route::get('search-project-user','Projects\ProjectController@searchProjectUser');

			/* === Task ===*/
				Route::post('storetask','Projects\TaskController@storetaskajax')->name('storetask');
				Route::post('updatetask','Projects\TaskController@updatetaskajax')->name('updatetask');
				Route::get('showtaskajax','Projects\TaskController@showtaskajax')->name('showtaskajax');
				Route::post('update_draggable_status','Projects\TaskController@update_draggable_status')->name('update_draggable_status');

				Route::post('task_ajax_delete','Projects\TaskController@task_ajax_delete')->name('task_ajax_delete');





			/* ===todo=== */
				Route::get('todo','Projects\ProjectController@todo');
				Route::post('todoadd','Projects\ProjectController@todoadd');


			/* === TASKLY START === */





	// Calender

	// Route::get('/{slug}/calender',['as' => 'calender.index','uses' =>'CalenderController@index'])->middleware(['auth','XSS']);

	// //Client

	// Route::get('/{slug}/clients',['as' => 'clients.index','uses' =>'ClientController@index'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/clients',['as' => 'clients.store','uses' =>'ClientController@store'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/clients/create',['as' => 'clients.create','uses' =>'ClientController@create'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/clients/edit/{id}',['as' => 'clients.edit','uses' =>'ClientController@edit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/clients/{id}',['as' => 'clients.update','uses' =>'ClientController@update'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/clients/{id}',['as' => 'clients.destroy','uses' =>'ClientController@destroy'])->middleware(['auth','XSS']);
	// // User
	// Route::get('/usersJson',['as' => 'user.email.json','uses' =>'UserController@getUserJson'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/searchJson/{search?}',['as' => 'search.json','uses' =>'ProjectController@getSearchJson'])->middleware(['auth','XSS']);
	// Route::get('/userProjectJson/{id}',['as' => 'user.project.json','uses' =>'UserController@getProjectUserJson'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/users',['as' => 'users.index','uses' =>'UserController@index'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/users/invite',['as' => 'users.invite','uses' =>'UserController@invite'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/users/invite',['as' => 'users.invite.update','uses' =>'UserController@inviteUser'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/users/edit/{id}',['as' => 'users.edit','uses' =>'UserController@edit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/users/update/{id}',['as' => 'users.update','uses' =>'UserController@update'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/users/{id}',['as' => 'users.remove','uses' =>'UserController@removeUser'])->middleware(['auth','XSS']);

	// Route::get('/my-account',['as' => 'users.my.account','uses' =>'UserController@account'])->middleware(['auth','XSS']);
	// Route::post('/my-account',['as' => 'update.account','uses' =>'UserController@update'])->middleware(['auth','XSS']);
	// Route::post('/my-account/password',['as' => 'update.password','uses' =>'UserController@updatePassword'])->middleware(['auth','XSS']);
	// Route::delete('/my-account',['as' => 'delete.avatar','uses' =>'UserController@deleteAvatar'])->middleware(['auth','XSS']);


	// Route::get('/','HomeController@index')->middleware(['auth','XSS']);
	// Route::get('/{slug?}', ['as' => 'home','uses' =>'HomeController@index'])->middleware(['auth','XSS']);


	// // Workspace
	// Route::post('/workspace',['as' => 'add_workspace','uses' =>'WorkspaceController@store'])->middleware(['auth','XSS']);
	// Route::delete('/workspace/{id}',['as' => 'delete_workspace','uses' =>'WorkspaceController@destroy'])->middleware(['auth','XSS']);
	// Route::delete('/workspace/leave/{id}',['as' => 'leave_workspace','uses' =>'WorkspaceController@leave'])->middleware(['auth','XSS']);
	// Route::get('/workspace/{id}',['as' => 'change_workspace','uses' =>'WorkspaceController@changeCurrantWorkspace'])->middleware(['auth','XSS']);
	// Route::get('/workspace/{slug}/change_lang/{lang}',['as' => 'change_lang_workspace','uses' =>'WorkspaceController@changeLangWorkspace'])->middleware(['auth','XSS']);
	// Route::get('/workspace/{slug}/lang/create',['as' => 'create_lang_workspace','uses' =>'WorkspaceController@createLangWorkspace'])->middleware(['auth','XSS']);
	// Route::get('/workspace/{slug}/lang/{lang}',['as' => 'lang_workspace','uses' =>'WorkspaceController@langWorkspace'])->middleware(['auth','XSS']);
	// Route::post('/workspace/{slug}/lang/{lang}',['as' => 'store_lang_data_workspace','uses' =>'WorkspaceController@storeLangDataWorkspace'])->middleware(['auth','XSS']);
	// Route::post('/workspace/{slug}/lang',['as' => 'store_lang_workspace','uses' =>'WorkspaceController@storeLangWorkspace'])->middleware(['auth','XSS']);


	// // project
	// Route::get('/{slug}/projects',['as' => 'projects.index','uses' =>'ProjectController@index'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/create',['as' => 'projects.create','uses' =>'ProjectController@create'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/{id}',['as' => 'projects.show','uses' =>'ProjectController@show'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/projects',['as' => 'projects.store','uses' =>'ProjectController@store'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/edit/{id}',['as' => 'projects.edit','uses' =>'ProjectController@edit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/projects/{id}',['as' => 'projects.update','uses' =>'ProjectController@update'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/projects/{id}',['as' => 'projects.destroy','uses' =>'ProjectController@destroy'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/projects/leave/{id}',['as' => 'projects.leave','uses' =>'ProjectController@leave'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/invite/{id}',['as' => 'projects.invite.popup','uses' =>'ProjectController@popup'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/share/{id}',['as' => 'projects.share.popup','uses' =>'ProjectController@sharePopup'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/projects/share/{id}',['as' => 'projects.share','uses' =>'ProjectController@share'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/projects/invite/{id}',['as' => 'projects.invite.update','uses' =>'ProjectController@invite'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/milestone/{id}',['as' => 'projects.milestone','uses' =>'ProjectController@milestone'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/projects/milestone/{id}',['as' => 'projects.milestone.store','uses' =>'ProjectController@milestoneStore'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/milestone/{id}/show',['as' => 'projects.milestone.show','uses' =>'ProjectController@milestoneShow'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/milestone/{id}/edit',['as' => 'projects.milestone.edit','uses' =>'ProjectController@milestoneEdit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/projects/milestone/{id}',['as' => 'projects.milestone.update','uses' =>'ProjectController@milestoneUpdate'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/projects/milestone/{id}',['as' => 'projects.milestone.destroy','uses' =>'ProjectController@milestoneDestroy'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/projects/{id}/file',['as' => 'projects.file.upload','uses' =>'ProjectController@fileUpload'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/{id}/file/{fid}',['as' => 'projects.file.download','uses' =>'ProjectController@fileDownload'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/projects/{id}/file/delete/{fid}',['as' => 'projects.file.delete','uses' =>'ProjectController@fileDelete'])->middleware(['auth','XSS']);

	// // Task Board
	// Route::get('/{slug}/projects/client/task-board/{code}',['as' => 'projects.client.task.board','uses' =>'ProjectController@taskBoard']);
	// Route::get('/{slug}/projects/{id}/task-board',['as' => 'projects.task.board','uses' =>'ProjectController@taskBoard'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/{id}/task-board/create',['as' => 'tasks.create','uses' =>'ProjectController@taskCreate'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/projects/{id}/task-board',['as' => 'tasks.store','uses' =>'ProjectController@taskStore'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/projects/{id}/task-board/order',['as' => 'tasks.update.order','uses' =>'ProjectController@taskOrderUpdate']);
	// Route::get('/{slug}/projects/{id}/task-board/edit/{tid}',['as' => 'tasks.edit','uses' =>'ProjectController@taskEdit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/projects/{id}/task-board/{tid}',['as' => 'tasks.update','uses' =>'ProjectController@taskUpdate'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/projects/{id}/task-board/{tid}',['as' => 'tasks.destroy','uses' =>'ProjectController@taskDestroy'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/projects/{id}/task-board/{tid}/{cid?}',['as' => 'tasks.show','uses' =>'ProjectController@taskShow']);

	// Route::post('/{slug}/projects/{id}/comment/{tid}/file/{cid?}',['as' => 'comment.store.file','uses' =>'ProjectController@commentStoreFile']);
	// Route
	//     ::delete('/{slug}/projects/{id}/comment/{tid}/file/{fid}',['as' => 'comment.destroy.file','uses' =>'ProjectController@commentDestroyFile']);
	// Route::post('/{slug}/projects/{id}/comment/{tid}/{cid?}',['as' => 'comment.store','uses' =>'ProjectController@commentStore']);
	// Route
	//     ::delete('/{slug}/projects/{id}/comment/{tid}/{cid}',['as' => 'comment.destroy','uses' =>'ProjectController@commentDestroy']);
	// Route::post('/{slug}/projects/{id}/sub-task/{tid}/{cid?}',['as' => 'subtask.store','uses' =>'ProjectController@subTaskStore']);
	// Route::put('/{slug}/projects/{id}/sub-task/{stid}',['as' => 'subtask.update','uses' =>'ProjectController@subTaskUpdate']);
	// Route::delete('/{slug}/projects/{id}/sub-task/{stid}',['as' => 'subtask.destroy','uses' =>'ProjectController@subTaskDestroy']);


	// // todo
	// //Route::get('/{slug}/todo',['as' => 'todos.index','uses' =>'TodoController@index'])->middleware(['auth','XSS']);
	// //Route::post('/{slug}/todo',['as' => 'todos.store','uses' =>'TodoController@store'])->middleware(['auth','XSS']);
	// //Route::put('/{slug}/todo',['as' => 'todos.update','uses' =>'TodoController@update'])->middleware(['auth','XSS']);
	// //Route::delete('/{slug}/todo',['as' => 'todos.destroy','uses' =>'TodoController@destroy'])->middleware(['auth','XSS']);

	// // note
	// Route::get('/{slug}/notes',['as' => 'notes.index','uses' =>'NoteController@index'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/notes/create',['as' => 'notes.create','uses' =>'NoteController@create'])->middleware(['auth','XSS']);
	// Route::post('/{slug}/notes',['as' => 'notes.store','uses' =>'NoteController@store'])->middleware(['auth','XSS']);
	// Route::get('/{slug}/notes/edit/{id}',['as' => 'notes.edit','uses' =>'NoteController@edit'])->middleware(['auth','XSS']);
	// Route::put('/{slug}/notes/{id}',['as' => 'notes.update','uses' =>'NoteController@update'])->middleware(['auth','XSS']);
	// Route::delete('/{slug}/notes/{id}',['as' => 'notes.destroy','uses' =>'NoteController@destroy'])->middleware(['auth','XSS']);

	// calendar
	//Route::get('/{slug}/calendar',['as' => 'calendar.index','uses' =>'CalendarController@index'])->middleware(['auth','XSS']);
	//Route::post('/{slug}/calendar',['as' => 'calendar.store','uses' =>'CalendarController@store'])->middleware(['auth','XSS']);
	//Route::delete('/{slug}/calendar',['as' => 'calendar.destroy','uses' =>'CalendarController@destroy'])->middleware(['auth','XSS']);
	//Route::put('/{slug}/calendar',['as' => 'calendar.update','uses' =>'CalendarController@update'])->middleware(['auth','XSS']);
	//Route::put('/{slug}/calendar/date',['as' => 'calendar.updateDate','uses' =>'CalendarController@updateDate'])->middleware(['auth','XSS']);
	//Route::post('/{slug}/calendar/json',['as' => 'calendar.getJson','uses' =>'CalendarController@getJson'])->middleware(['auth','XSS']);
	//Route::post('/{slug}/event',['as' => 'event.store','uses' =>'CalendarController@eventStore'])->middleware(['auth','XSS']);






			/* == TASKLY END ================================== */


			});

			Route::group(['middleware' => 'employee'], function () {
				/*
				|--------------------------------------------------------------------------
				| Employee Frontend : Dashboard, Profile, Attendance, Schedules, Leaves, Settings
				|--------------------------------------------------------------------------
				*/
				// dashboard
				Route::get('personal/dashboard', 'Personal\PersonalDashboardController@index');

				// profile
				Route::get('personal/profile/view', 'Personal\PersonalProfileController@index')->name('myProfile');

				Route::get('personal/profile/add/', 'Personal\PersonalProfileController@profileAdd')->name('personal/profile/add/');
				Route::post('personal/profile/add/', 'Personal\PersonalProfileController@profileStore')->name('personal/profile/add/');

				Route::get('personal/profile/edit/', 'Personal\PersonalProfileController@profileEdit');
				Route::post('personal/profile/update', 'Personal\PersonalProfileController@profileUpdate');

				//Tasks

				Route::get('personal/tasks/view', 'Projects\PersonalTaskController@index');

				// attendance
				Route::get('personal/attendance/view', 'Personal\PersonalAttendanceController@index');
				Route::get('get/personal/attendance', 'Personal\PersonalAttendanceController@getPA');

				// schedules
				Route::get('personal/schedules/view', 'Personal\PersonalSchedulesController@index');
				Route::get('get/personal/schedules', 'Personal\PersonalSchedulesController@getPS');

				// leaves
				Route::get('personal/leaves/view', 'Personal\PersonalLeavesController@index')->name('viewPersonalLeave');
				Route::get('personal/leaves/single/view', 'Personal\PersonalLeavesController@single');
				Route::get('personal/leaves/edit/{id}', 'Personal\PersonalLeavesController@edit');
				Route::post('personal/leaves/update', 'Personal\PersonalLeavesController@update');
				Route::post('personal/leaves/request', 'Personal\PersonalLeavesController@requestL');
				Route::get('personal/leaves/delete/{id}', 'Personal\PersonalLeavesController@delete');
				Route::get('get/personal/leaves', 'Personal\PersonalLeavesController@getPL');
				Route::get('view/personal/leave', 'Personal\PersonalLeavesController@viewPL');

				// settings
				Route::get('personal/settings', 'Personal\PersonalSettingsController@index');

				// user
				Route::get('personal/update-user', 'Personal\PersonalAccountController@viewUser')->name('changeUser');
				Route::get('personal/update-password', 'Personal\PersonalAccountController@viewPassword')->name('changePass');
				Route::post('personal/update/user', 'Personal\PersonalAccountController@updateUser');
				Route::post('personal/update/password', 'Personal\PersonalAccountController@updatePassword');
				Route::get('/view_employee_payroll','Personal\PersonalPayrollController@view_employee_payroll');
				Route::get('/emp_payroll_download/{payroll_id}','Personal\PersonalPayrollController@emp_payroll_download');
			/* Employee File Contract view */
Route::get('employee/file/view', 'EmpfileController@index');
Route::get('download/{file}', 'EmpfileController@download');

			}); /* Employee middleware end */

			Route::group(['middleware' => 'client'], function () {
				/*
				|--------------------------------------------------------------------------
				| Employee Frontend : Dashboard, Profile, Attendance, Schedules, Leaves, Settings
				|--------------------------------------------------------------------------
				*/
				// dashboard
				Route::get('client/dashboard', 'Client\ClientDashboardController@index');
				// contact
				Route::get('client/contact', 'Client\ClientDashboardController@contact');
				Route::post('client/store_contact', 'Client\ClientDashboardController@storeContact');

				// project
				Route::get('client/project', 'Client\ClientDashboardController@project');

				// profile
				Route::get('client/profile/view', 'Client\ClientProfileController@index')->name('myProfile');

				Route::get('client/profile/add/', 'Client\ClientProfileController@profileAdd')->name('client/profile/add/');
				Route::post('client/profile/add/', 'Client\ClientProfileController@profileStore')->name('client/profile/add/');

				Route::get('client/profile/edit/', 'Client\ClientProfileController@profileEdit');
				Route::post('client/profile/update', 'Client\ClientProfileController@profileUpdate');



				//Tasks

				Route::get('client/tasks/view', 'Projects\ClientTaskController@index');

				// attendance
				Route::get('client/attendance/view', 'Client\ClientAttendanceController@index');
				Route::get('get/client/attendance', 'Client\ClientAttendanceController@getPA');

				// schedules
				Route::get('client/schedules/view', 'Client\clientSchedulesController@index');
				Route::get('get/client/schedules', 'Client\clientSchedulesController@getPS');

				// leaves
				Route::get('client/leaves/view', 'Client\clientLeavesController@index')->name('viewclientLeave');
				Route::get('client/leaves/single/view', 'Client\clientLeavesController@single');
				Route::get('client/leaves/edit/{id}', 'Client\clientLeavesController@edit');
				Route::post('client/leaves/update', 'Client\clientLeavesController@update');
				Route::post('client/leaves/request', 'Client\clientLeavesController@requestL');
				Route::get('client/leaves/delete/{id}', 'Client\clientLeavesController@delete');
				Route::get('get/client/leaves', 'Client\clientLeavesController@getPL');
				Route::get('view/client/leave', 'Client\clientLeavesController@viewPL');


				// Atik

		


				// End Atik

				// settings
				Route::get('client/settings', 'Client\clientSettingsController@index');

				// user
				Route::get('client/update-user', 'Client\ClientAccountController@viewUser')->name('changeUser');
				Route::get('client/update-password', 'Client\ClientAccountController@viewPassword')->name('changePass');
				Route::post('client/update/user', 'Client\ClientAccountController@updateUser');
				Route::post('client/update/password', 'Client\ClientAccountController@updatePassword');
			}); /* client middleware end */

		});

	});


	Auth::routes();
	Route::get('lang/{locale}', 'LanguageController@lang');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');
	Route::view('permission-denied', 'errors.permission-denied')->name('denied');
	Route::view('account-disabled', 'errors.account-disabled')->name('disabled');
	Route::view('account-not-found', 'errors.account-not-found')->name('notfound');

	Route::post('/postinsert','WeeklyPayController@store');


	//Employer

Route::get('/employer/create','EmployerController@index');
Route::post('/employer/add','EmployerController@add')->name('employer.add');
Route::match(['get','post'],'/employer/update/{id}','EmployerController@update')->name('employer.update');
Route::match(['get','post'],'/employer/delete/{id}','EmployerController@delete')->name('employer.delete');

//EmployerFilling

Route::get('/employer_filling/create','EmployerFillingController@index');
Route::post('/employer_filling/add','EmployerFillingController@add')->name('employer_filling.add');
Route::match(['get','post'],'/employer_filling/update/{id}','EmployerFillingController@update')->name('employer_filling.update');
Route::match(['get','post'],'/employer_filling/delete/{id}','EmployerFillingController@delete')->name('employer_filling.delete');

//Add new Employee
// Route::post('/employee/add','AddNewEmployeeController@store');
Route::get('/employee/view/{id}','AddNewEmployeeController@view');
Route::get('export/employee/list','AddNewEmployeeController@export');

