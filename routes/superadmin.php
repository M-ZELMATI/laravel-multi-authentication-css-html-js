<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SuperAdminAuthController;

Route::get('/superadmin/register', [SuperAdminAuthController::class, 'create'])->middleware('guest:web,admin,superadmin')->name('superadmin.register');

Route::post('/superadmin/register', [SuperAdminAuthController::class, 'store'])->middleware('guest:web,admin,superadmin')->name('superadmin.register');; 

Route::get('/superadmin/login', [SuperAdminAuthController::class, 'showLoginForm'])->middleware('guest:web,admin,superadmin')->name('superadmin.login');
Route::post('/superadmin/login', [SuperAdminAuthController::class, 'login'])->middleware('guest:web,admin,superadmin')->name('superadmin.login');
Route::get('/superadmin/logout', [SuperAdminAuthController::class, 'logout'])->middleware('auth:superadmin')->name('superadmin.logout');
Route::group(['middleware' => ['auth:superadmin,admin,web']], function () {
    Route::get('/superadmin/dashboard', [SuperAdminAuthController::class, 'dashboard'])->name('superadmin.dashboard');
});