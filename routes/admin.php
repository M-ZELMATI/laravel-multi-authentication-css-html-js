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

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;

Route::get('/admin/register', [AdminAuthController::class, 'create'])->middleware('guest:web,admin,superadmin')->name('admin.register');

Route::post('/admin/register', [AdminAuthController::class, 'store'])->middleware('guest:web,admin')->name('admin.register');; 

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->middleware('guest:web,admin,superadmin')->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->middleware('guest:web,admin')->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:web,admin,superadmin')->name('admin.logout');
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});