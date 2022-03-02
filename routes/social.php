<?php
use App\Http\Controllers\SocialLogin\GmailLogin;

use App\Http\Controllers\SocialLogin\FacebookLogin;


Route::get('redirect', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'redirect']);
Route::get('callback', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'callback']);


Route::get('redirectadmin', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'redirectadmin']);
Route::get('callbackadmin', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'callbackadmin']);



Route::get('redirectfacebook', [App\Http\Controllers\SocialLogin\FacebookLogin::class, 'redirectfacebook']);
Route::get('callbackfacebook', [App\Http\Controllers\SocialLogin\FacebookLogin::class, 'callbackfacebook']);




Route::get('redirectfacebookadmin', [App\Http\Controllers\SocialLogin\FacebookLogin::class, 'redirectfacebookadmin']);
Route::get('callbackfacebookadmin', [App\Http\Controllers\SocialLogin\FacebookLogin::class, 'callbackfacebookadmin']);