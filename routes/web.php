<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GstBillingController;
use App\Http\Controllers\CompanyDetailController;
use App\Http\Controllers\VendorInvoiceController;
use App\Http\Controllers\AccountSettingController;






Route::group(["middleware" => "guest"], function() {
Route::get('/',[AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgotPassword');

Route::post('/process-forgot-password', [AuthController::class, 'processForgotPassword'])->name('processForgotPassword');

Route::get('/reset-password/{token}', [AuthController::class, 'resetPassword'])->name('resetPassword');
Route::post('/process-reset-password', [AuthController::class, 'processResetPassword'])->name('processResetPassword');


 

});

Route::group(['middleware' => 'auth'], function() {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// party route
Route::resource('/party', PartyController::class);
// gst-billing route
Route::resource('gst-billing', GstBillingController::class);
// vendor invoice route
Route::resource('vendor-invoice', VendorInvoiceController::class);

// User route
Route::resource('users', UserController::class);


// update password route
Route::post('/update-password', [UserController::class, 'UpdatePassword'])->name('user.UpdatePassword');

// comapny details route
Route::get('/company-details', [CompanyDetailController::class, 'CompanyDetail'])->name('CompanyDetail');

Route::post('/process-company-details', [CompanyDetailController::class, 'processCompanyDetail'])->name('processCompanyDetail');





Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});








