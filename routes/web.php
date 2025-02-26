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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/dashboard', [App\Http\Controllers\HomeController::class, 'Dashboard']);



Route::get('/', function () {
    return view('modules.auth.login');
});

Route::get('/forgot-password', function () {
    return view('modules.auth.forgot-password');
});

Route::get('/new-password', function () {
    return view('modules.auth.new-password');
});





// Customers

Route::post('admin/addcustomer', [App\Http\Controllers\CustomerController::class, 'AddCustomer']);
Route::get('customers', [App\Http\Controllers\CustomerController::class, 'AllCustomer']);



Route::get('/customer/detail', function () {
    return view('modules.customers.detail.index');
});

Route::get('/customer/add', function () {
    return view('modules.customers.add');
});


// Daily Supply & Billing

Route::get('/daily-supply', function () {
    return view('modules.daily-supply.index');
});

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
