<?php
//namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\SuperAdminAuthController;
use App\Http\Controllers\SendSMSController;
use App\Http\Controllers\JS\Jscontroller;
use App\Http\Controllers\Mailcontroller\verificationregister;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', function () {
// if(auth()->guard('admin')->check()){
//     return redirect("/admin/dashboard");
// }
// else{
//     if(auth()->guard('superadmin')->check()){
//         return redirect("/superadmin/dashboard");
//     }
//     else{
//         return view('dashboard');
//     }
// }
// }
return view('dashboard');} 
)->middleware(['auth:web,'])->name('dashboard');



require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/superadmin.php';

require __DIR__.'/social.php';
require __DIR__.'/mail.php';


Route::get('redirect', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'redirect']);
Route::get('callback', [App\Http\Controllers\SocialLogin\GmailLogin::class, 'callback']);
 
Route::get('/send-sms', [SendSMSController::class, 'index']);

Route::post('loginuser', [App\Http\Controllers\JS\Jscontroller::class, 'loginuser']);

Route::post('registeruser', [App\Http\Controllers\JS\Jscontroller::class, 'registeruser']);


Route::post('emailcode', [App\Http\Controllers\JS\Jscontroller::class, 'emailcode']);

Route::get('/login/user/forgetpassword', [App\Http\Controllers\JS\Jscontroller::class, 'showfogetpassword']);
Route::get('/login/admin/forgetpassword', [App\Http\Controllers\JS\Jscontroller::class, 'showfogetpassword']);

Route::post('/modalcode',  [App\Http\Controllers\JS\Jscontroller::class, 'modalcode'])->name('modalcode');

Route::post('/newpassword',  [App\Http\Controllers\JS\Jscontroller::class, 'newpassword'])->name('newpassword');
