<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('modules.auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'Dashboard']);

// Customers

Route::get('customer/add', [App\Http\Controllers\CustomerController::class, 'Customer']);
Route::post('admin/addcustomer', [App\Http\Controllers\CustomerController::class, 'AddCustomer']);
Route::get('customers', [App\Http\Controllers\CustomerController::class, 'AllCustomer']);
Route::get('customer/edit/{id}', [App\Http\Controllers\CustomerController::class, 'EditCustomer']);
Route::post('admin/updatecustomer', [App\Http\Controllers\CustomerController::class, 'UpdateCustomer']);
Route::post('delete-mutiple-customer', [App\Http\Controllers\CustomerController::class, 'DeleteCustomerBulk']);
Route::get('change-status/{id}', [App\Http\Controllers\CustomerController::class, 'UpdateCustomeStatus']);
Route::get('customer-filter', [App\Http\Controllers\CustomerController::class, 'CustomerFilter']);
Route::post('admin/deletecustomer', [App\Http\Controllers\CustomerController::class, 'DeleteCustomer']);
Route::get('/export-customer', [App\Http\Controllers\CustomerController::class, 'exportAllCustomer']);
Route::get('customer/detail/{id}', [App\Http\Controllers\CustomerController::class, 'CustomerDetail']);
Route::get('customer/detail/settings/{id}', [App\Http\Controllers\CustomerController::class, 'Customersetting']);
Route::post('admin/updatecustomersettings', [App\Http\Controllers\CustomerController::class, 'UpdateCustomerSettings']);
Route::get('customer/detail/cash-in-cash-out/{id}', [App\Http\Controllers\CustomerController::class, 'CustomerCash']);

// Daily Supply & Billing
Route::get('daily-supply', [App\Http\Controllers\DailySupplyController::class, 'DailySupply']);
Route::post('admin/setdailyrate', [App\Http\Controllers\DailySupplyController::class, 'setDailyRate']);
Route::post('admin/adddropsupply', [App\Http\Controllers\DailySupplyController::class, 'setDailySupply']);
Route::post('admin/updatedropsupply', [App\Http\Controllers\DailySupplyController::class, 'UpdateDailySupply']);
Route::post('admin/receiveamount', [App\Http\Controllers\DailySupplyController::class, 'ReceiveAmount']);
Route::post('admin/adddropsupplyedit', [App\Http\Controllers\DailySupplyController::class, 'UpdateDailySupplyCustomer']);
Route::post('admin/receiveamountedit', [App\Http\Controllers\DailySupplyController::class, 'ReceiveAmountEdit']);
Route::post('admin/addcheckin', [App\Http\Controllers\DailySupplyController::class, 'AddCheckIn']);
Route::post('admin/addcashout', [App\Http\Controllers\DailySupplyController::class, 'AddCashOut']);

// Reports

Route::get('/report/chicken', function () {
    return view('modules.reports.chicken');
});

Route::get('/report/fat', function () {
    return view('modules.reports.fat');
});

Route::get('/report/waste', function () {
    return view('modules.reports.waste');
});

// Detail
Route::get('customer/detail/chicken-supply', function () {
    return view('modules.customers.detail.chicken-supply.index');
});

Route::get('customer/detail/fat', function () {
    return view('modules.customers.detail.fat.index');
});

Route::get('customer/detail/waste', function () {
    return view('modules.customers.detail.waste.index');
});
