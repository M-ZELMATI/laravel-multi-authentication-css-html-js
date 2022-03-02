<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/sendregister/{comptid}', [App\Http\Controllers\Mailcontroller\verificationregister::class, 'sendmail'])->name('sendregister');
Route::post('/sendcodegmail', [App\Http\Controllers\Mailcontroller\verificationregister::class, 'emailcode'])->name('emailcode');


Route::get('confirmation/{comptid}', [App\Http\Controllers\Mailcontroller\verificationregister::class, 'show'])->name('confirmation');
Route::get('active/{comptid}', [App\Http\Controllers\Mailcontroller\verificationregister::class, 'active'])->name('active');
