<?php

namespace App\Http\Controllers\SocialLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Validator,Redirect,Response,File;
use Socialite;
use Auth;
use App\Models\Admin;
use App\Models\User;
class FacebookLogin extends Controller
{
    //
    
   public function redirectfacebook()
   {
       error_log('hiiiiiii1');
   
       return Socialite::driver('facebook')->redirect();
   }
   
   public function callbackfacebook()
   {
       // error_log('hiiiiiii2');
       // $user = Socialite::driver('facebook')->stateless()->user();
       //  $id = $user->getId();
       //  $email=$user->getEmail();
       //  $nom=$user->getName();
   
       //  error_log($id );
       //  error_log($nom );
       //  error_log($email );
   
       try {
               $user = Socialite::driver('facebook')->stateless()->user();
              $exist = User::where('email', $user->getEmail())->first();
   
              if( $exist){
                  Auth::login($exist);
         //  Auth::attempt(['email' => $user->getEmail(), 'password' => '123456dummy'])){
               return redirect()->intended('/dashboard');
       
               }else{
                   error_log('hiiiiiii##');
                   
   
                   $name=mb_substr($user->getName(),0,7);
                   $newUser = User::create([
                       'name' =>$name ,
                       'email' => $user->getEmail(),
                       'google_id'=> $user->getId(),
                      // 'password' => encrypt('123456dummy')
                       'password' => '123456dummy'
   
                   ]);
                   //Auth::guard('web');
                //    Auth::guard('web')->attempt([
                //        'email'=>$user->getEmail(),
                //        'password'=>"123456dummy",
                //    ],);
                   Auth::guard('web')->login($exist);
                   return redirect()->intended('/dashboard');
               }
           } catch (Exception $e) {
               dd($e->getMessage());
           }
      }


        
   public function redirectfacebookadmin()
   {
       error_log('hiiiiiii1');
       
    config(['services.facebook.client_secret' => env('FACEBOOK_CLIENT_SECRET_ADMIN')]);
    config(['services.facebook.client_id' => env('FACEBOOK_CLIENT_ID_ADMIN')]);
    config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT_ADMIN')]);
   
       return Socialite::driver('facebook')->redirect();
   }
   
   public function callbackfacebookadmin()
   {
       // error_log('hiiiiiii2');
       // $user = Socialite::driver('facebook')->stateless()->user();
       //  $id = $user->getId();
       //  $email=$user->getEmail();
       //  $nom=$user->getName();
   
       //  error_log($id );
       //  error_log($nom );
       //  error_log($email );
       config(['services.facebook.client_secret' => env('FACEBOOK_CLIENT_SECRET_ADMIN')]);
       config(['services.facebook.client_id' => env('FACEBOOK_CLIENT_ID_ADMIN')]);
       config(['services.facebook.redirect' => env('FACEBOOK_REDIRECT_ADMIN')]);
   
       try {
               $user = Socialite::driver('facebook')->stateless()->user();
              $exist = Admin::where('email', $user->getEmail())->first();
   
              if( $exist){
                Auth::guard('admin')->login($exist);

                 // Auth::guard('admin')->login($exist);
         //  Auth::attempt(['email' => $user->getEmail(), 'password' => '123456dummy'])){
               return redirect()->intended('/admin/dashboard');
       
               }else{
                   error_log('hiiiiiii##');
                   
   
                   $name=mb_substr($user->getName(),0,7);
                   $newUser = Admin::create([
                       'name' =>$name ,
                       'email' => $user->getEmail(),
                       'google_id'=> $user->getId(),
                      // 'password' => encrypt('123456dummy')
                       'password' => '123456dummy'
   
                   ]);
                   //Auth::guard('web');
                //    Auth::guard('web')->attempt([
                //        'email'=>$user->getEmail(),
                //        'password'=>"123456dummy",
                //    ],);

                Auth::guard('admin')->login($newUser);

//                Auth::guard('admin')->login($exist);
                return redirect()->intended('/admin/dashboard');
               }
           } catch (Exception $e) {
               dd($e->getMessage());
           }
      }
   }

