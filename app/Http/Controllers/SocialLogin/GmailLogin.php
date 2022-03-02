<?php

namespace App\Http\Controllers\SocialLogin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;
use Socialite;
use Auth;
use App\Models\User;
use App\Models\Admin;

use Illuminate\Auth\Events\Registered;

class GmailLogin extends Controller
{
    //
    
public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    try {
            $user = Socialite::driver('google')->stateless()->user();
            $finduser = User::where('email', $user->getEmail())->first();

            if($finduser){
                //Auth::guard('admin');
                // return redirect('/home');
                //$user = User::where('email', $user->getEmail())->first();

                //event(new Registered($user));

                Auth::login($finduser);
                return redirect("/dashboard");
            }else{
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'password' => encrypt('123456dummy')
                ]);
                event(new Registered($user));

                Auth::login($newUser);
                //Auth::guard('admin');
                return redirect("/dashboard");
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
   }


   public function redirectadmin()

   {
    config(['services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_ADMIN')]);
    config(['services.google.client_id' => env('GOOGLE_CLIENT_ID_ADMIN')]);
    config(['services.google.redirect' => env('GOOGLE_REDIRECT_ADMIN')]);


       return Socialite::driver('google')->redirect();
   }
   
   public function callbackadmin()
   {
       
    config(['services.google.client_secret' => env('GOOGLE_CLIENT_SECRET_ADMIN')]);
    config(['services.google.client_id' => env('GOOGLE_CLIENT_ID_ADMIN')]);
    config(['services.google.redirect' => env('GOOGLE_REDIRECT_ADMIN')]);
       try {
           error_log("CALBACKADMIN");
           
               $user = Socialite::driver('google')->stateless()->user();
               $finduser = Admin::where('email', $user->getEmail())->first();
             //  $finduser2 = User::where('email', $user->getEmail())->first();

               if($finduser){
                error_log("CALBACKADMIN v");
               // Auth::guard('admin')->login($finduser2);
                 // Auth::login($finduser2);
                  error_log("CALBACKADMIN v");              
                   // Auth::guard('admin')->attempt([ 'email' =>$user->getEmail(),'password' =>$finduser->password])->login($finduser);
                   Auth::guard('admin')->login($finduser);
                   return redirect()->intended("/admin/dashboard");
               }else{
                error_log("CALBACKADMIN nv");

                   $newUser = Admin::create([
                       'name' => $user->getName(),
                       'email' => $user->getEmail(),
                       'password' => encrypt('123456dummy')
                   ]);
                   error_log("CALBACKADMIN nv2");

                   event(new Registered($user));
   
                  // Auth::login($newUser);
                   //Auth::guard('admin');
                   error_log("CALBACKADMIN nv3");
                   Auth::guard('admin')->login($newUser);

                   return redirect("/admin/dashboard");
               }
           } catch (Exception $e) {
               dd($e->getMessage());
           }
      }
   

   
}
