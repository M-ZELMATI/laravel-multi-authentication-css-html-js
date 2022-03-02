<?php

namespace App\Http\Controllers\Mailcontroller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;

use App\Providers\RouteServiceProvider;
use Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class verificationregister extends Controller
{
    //

    public function show($comptid)
    {
        # code...
        return view('Mail.goverify',['comptid'=>$comptid]);
    }

    public function active($comptid)
    {
   
        $modal=substr($comptid, -1); 
        $compt['id']=substr($comptid, 0, -1);

        if($modal=='1'){
            $user=User::findOrFail($compt['id']);
        }
        else{
            if($modal=='2'){
                $user=Admin::findOrFail($compt['id']);
            }
        }
        $user->activecompt='2';
        $user->save();
        if($modal=='1'){
        
         Auth::login($user);
         return redirect(RouteServiceProvider::HOME);
    }
    else{
        if($modal=='2'){
            Auth::guard('admin')->login($user);

            return redirect("admin/dashboard");
        }
    }    }



   function sendmail($comptid){
        // error_log(Session::has('id'));
        // error_log('--------------=======------------------');
        $modal=substr($comptid, -1); 
        $compt['id']=substr($comptid, 0, -1);

        if($modal=='1'){
           // $compt['modal']="User";
            $user=User::findOrFail($compt['id']);
        }
        else{
            if($modal=='2'){
               // $compt['modal']="Admin";
                $user=Admin::findOrFail($compt['id']);

            }
        }


        error_log($compt['id']);
        $details=
        [
            'title'=>"MAil form for register page",
            'body'=>"this for testing mail",
          
        ];
   
    $details['id']=$comptid;
    
    //$user=$compt['modal']::findOrFail($compt['id']);
    error_log($user);
    $details['email']=$user->email;
    
    

    
    
    
    try {
        // send your mail
       Mail::to(''.$details['email'].'')->send(new \App\Mail\register($details));
    }
    catch(Exception $e){
    
        return redirect("/confirmation/".$comptid);
    
    }
        
        return redirect("/confirmation/".$comptid);
    }




public $code;

   function emailcode(Request $request){
       error_log('heeeeeeeeellllllllllllll');
       error_log($request->modal);
       error_log($request->id);

       $details=
    [
        'title'=>"MAil form for register page",
        'body'=>"this for testing mail",
        'id'=>$request->id,
        'code'=>$request->code
      
    ];
    $this->code=$request->code;
      
    if($request->modal=='User'){
        // $compt['modal']="User";
         $user=User::findOrFail($details['id']);
     }
     else{
         if($request->modal=='Admin'){
            // $compt['modal']="Admin";
             $user=Admin::findOrFail($details['id']);

         }
     }
    $details['email']=$user->email;
    error_log('this is user email');
    error_log($user->email);
    try {
        // send your mail
       Mail::to(''.$details['email'].'')->send(new \App\Mail\code($details));
    }
    catch(Exception $e){
    
        return response()->json([
            'ok'=>true
            ]);    
        }
   
   }
}


 // if(Session::has('id')){
    //     $details['id']=Session::get('id');
    //     $details['email']=Session::get('email');
    //     Session::put('id',  $details['id']);
    // }
    // else{
                // return redirect("/confirmation/{{$details['id']}}")->with(['id'=>$details['id'],'error'=>false]);
    // do something, log it, send an email to yourself, etc
        // return redirect("/confirmation/{{$details['id']}}")->with(['id'=>$details['id'],'error'=>true]);

            // }
        // $details=
        // [
        //     'title'=>"MAil form for register page",
        //     'body'=>"this for testing mail",
        //     'id'=>Session::get('id'),
        //     'email'=>Session::get('email'),
        // ];
    
         # code...
        // $user=User::find($id);
        // $user->activecompt='2';
        // $user->save();
        //  Auth::login($user);


            // function activecompt($modal){
    //     $user=$modal::find($id);
    //         $user->activecompt='2';
    //         $user->save();
    //     if($modal=="User"){
            
    //          Auth::login($user);
    //          return redirect(RouteServiceProvider::HOME);
    //     }
    //     else{
    //         if($modal=="Admin"){
    //             Auth::guard('admin')->login($user);

    //             return redirect("admin/dashboard");
    //         }
    //     }
    // }