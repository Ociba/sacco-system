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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//Members details
Route::get('/members-details','Member_detailController@showMemberDetails');
Route::post('/save-members-details','Member_detailController@saveMembersDetails');
Route::patch('/update-member-details/{id}','Member_detailController@updateMembersDetailTable');
Route::delete('/delete-member-details/{id}','Member_detailController@deleteMembersDetails');

//Next of kin
Route::post('/save-nextofkin-details','Next_of_kinController@saveNextOfKinDetails');
Route::get('/display-next-of-kin-details','Next_of_kinController@displayNextOfKinDetails');
Route::patch('/update-nextofkin-details/{id}','Next_of_kinController@updateNextOfKinDetailTable');
Route::delete('/delete-nextofkin-details/{id}','Next_of_kinController@deleteNextOfKinDetails');

//Accounts
Route::post('/save-account','AccountController@createAccount');
Route::get('/show-account','AccountController@displayAccount');
Route::patch('/update-account/{id}','AccountController@editAccount');
Route::delete('/delete-account/{id}','AccountController@destroy');

//savings
Route::post('/save-savings','SavingController@saveSavings');
Route::get('/display-savings','SavingController@showSavings');
Route::patch('/update-savings/{id}','SavingController@updateSavings');
Route::delete('/delete-savings/{id}','SavingController@deleteSavings');

//loan
Route::post('/save-loan','LoanController@createLoan');
Route::get('/loan-active','LoanController@displayLoanDetails');
Route::get('/loan-cleared','LoanController@displayLoanCleared');
Route::delete('/delete-loan/{id}','LoanController@updateLoan');
//Benefits
Route::post('/save-benefit','BenefitController@createBenefit');
Route::get('/display-benefit','BenefitController@displayBenefit');
Route::delete('/delete-benefit/{id}','BenefitController@updateBenefit');

//Expenses
Route::post('/save-expenses','ExpensesController@createExpenses');
Route::get('/display-expenses','ExpensesController@displayExpenses');
Route::patch('/edit-expenses/{id}','ExpensesController@editExpenses');
Route::delete('/delete-expenses/{id}','ExpensesController@deleteExpenses');
//role
Route::post('/save-role','RoleController@createRole');
Route::get('/show-role','RoleController@displayRole');
Route::patch('/edit-role/{id}','RoleController@editRole');
Route::patch('/update-role/{id}','RoleController@updateRole');
Route::delete('/delete-role/{id}','RoleController@deleteRole');
//permission
Route::get('/display-checkboxes','PermissionController@pickAllPermissionsCheckBox');
Route::get('/display-permission','PermissionController@getAllPermissionsForARole');
Route::patch('/assign-role/{id}','PermissionController@assign_roles');
Route::post('/save-permission','PermissionController@assign_roles');
Route::delete('/delete-permission/{id}','PermissionController@unsignPermission');

Route::resource('products', 'ProductController');

