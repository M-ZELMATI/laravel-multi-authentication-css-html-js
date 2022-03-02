<?php

namespace App\Http\Controllers\JS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\User;
use App\Models\SuperAdmin;
use Illuminate\Support\Facades\Hash;

use Validator;
use Auth;
class Jscontroller extends Controller
{
    //

        
public function rules($args)
{
    for ($i = 0; $i < count($args); $i=$i+2) {
        $conditions[$args[$i]]=[$args[$i+1]];
    }
    return $conditions;
}
         

function validation($request,$rules){
    $validator = Validator::make($request->all(),
     $this->rules($rules) );
     error_log($validator->errors());
  
    return  $validator;
}



function switshmodalexist($Modal,$email){
    error_log('user enter for return');

    switch ($Modal) {
        case 'User':
            $user=User::where('email','=',$email)->first();
            break;
        case 'Admin':
            $user=Admin::where('email','=',$email)->first();
            break;
        case 'SuperAdmin':
            $user=SuperAdmin::where('email','=',$email)->first();
            break;
     }
     error_log('user enter for return');
     return $user;
}


public function successuserlogin($user,$password){
    if($user){
        if (Hash::check($password, $user->password)) {
        // The user is active, not suspended, and exists.
            return response()->json([
                'exist_password'=>true,'exist'=>true,"error_exist"=>false, 'gexist'=>true
            ]);
        }
        else{
            return response()->json([
                'gexist'=>true,"error_exist"=>false, 'exist_password'=>false
            ]);
        }
    }
    else{
            return response()->json([
                'gexist'=>false,'exist_password'=>false,"error_exist"=>false
        ]);
    }
}
public function failuserlogin($user,$validator){
    error_log( '-============================');

    error_log($user);

    if($user){
        $gexist=true;
    }
    else{
        $gexist=false;

    }
  

    return response()->json([
             'error'=>$validator->errors(),"error_exist"=>true, 'gexist'=> $gexist
         ]);

}


public $loginrules=['email', 'required', 'password', 'min:7|required'];



function logintest($request,$rules,$fail,$success,$modal="User"){
error_log($request->email);
error_log($request->modal);


    $validator = $this->validation($request,$rules);  
    $user = $this->switshmodalexist($request->Modal,$request->email);
   

    if($validator->fails()){

        return $this->$fail($user,$validator,$modalf=$modal);   
    }
    else{

        return  $this->$success($user,$request->password,$modalf=$modal);
    }
}



function loginuser(Request $request){
return $this->logintest($request,$this->loginrules,"failuserlogin","successuserlogin");

}




public function failuserregister($user,$validator)
{
    $gexist=false;
    if($user){
        $gexist=true;
    }
    else{
        $gexist=false;

    }
    error_log($gexist);
    error_log( '-============================');
    return response()->json([
             'error'=>$validator->errors(),'gexist'=> $gexist,"error_exist"=>true
         ]);
}





function successuserregister($user,$password){
    if($user){      
        // The user is active, not suspended, and exists.
        $gexist=true;
    }
    else{
        $gexist=false;

    }
    return response()->json([
        'gexist'=>$gexist,"error_exist"=>false
        ]);
}

// public $registerrules=[
// 'name','string|max:8|required',
// 'email', 'string|email|max:50|unique:users|required',
// 'password','required',
// 'password_confirmation','same:password'
// ];


public $registerrules=[ 'name', "min:3|max:8", 'email', 'required', 'password', 'min:8', 'password_confirmation', 'same:password'];
// public $loginrules=['email', 'required', 'password', 'min:7|required'];

function registeruser(Request $request){

    error_log('heeeeeeer');
    return $this->logintest($request,$this->registerrules,"failuserregister","successuserregister");

}



public $emailrules=[ 'email', 'required'];

public function showfogetpassword(){
    $parts=parse_url($_SERVER['REQUEST_URI']);
    $path_parts=explode('/', $parts['path']);
    error_log( $path_parts[count($path_parts)-2]);
    if($path_parts[count($path_parts)-2]=='user'){
        $modal='User';
        error_log('if user ');
    }
    else{
        if($path_parts[count($path_parts)-2]=='admin'){
        $modal='Admin';
        error_log('first');
        error_log($modal);
    }

    }
    return view('password.emailcode',['modal'=>$modal]);
}



public function failuseremail($user,$validator,$modal)
{    error_log( '-============================');
    $gexist=false;
error_log($user);
    if(! Empty($user)){
        $gexist=true;
        error_log( '-============================');
    }
    else{
        $gexist=false;

    }
    error_log( $gexist);
    error_log( '-============================');
    return response()->json([
             'error'=>$validator->errors(),'gexist'=> $gexist,"error_exist"=>true,'modal'=>$modal,
         ]);
}





function successuseremail($user,$password,$modal){
    error_log( '-=====================ssss=======');
error_log($modal);

    if(! Empty($user)){      
        // The user is active, not suspended, and exists.
        error_log( '-=====================exist=======');

        $gexist=true;
        return response()->json([
            'gexist'=>$gexist,"error_exist"=>false,'modal'=>$modal,'id'=>$user->id
            ]);
    }
    else{
        error_log( '-=====================nexist=======');

        $gexist=false;
        return response()->json([
            'gexist'=>$gexist,"error_exist"=>false,'modal'=>$modal
            ]);
    }
   
  
}


 public function emailcode(Request $request)
 {
     # code...
     error_log('heeeeeeer');
     error_log($request->Modal);
    return $this->logintest($request,$this->emailrules,"failuseremail","successuseremail",$request->Modal);
 } 


 public $coderules=[ 'code', 'required'];



 public function  failcode($validator){
     error_log('faillle ----------');
    return response()->json([
        'error'=>$validator->errors(),'error_exist'=>true
    ]);
 }

 public function  successcode($request,$validator){
    error_log('successc ----------');
error_log($request->oldcode);
error_log($request->code);
     if($request->oldcode==$request->code){
        return response()->json([
            'codevrais'=>true,'error_exist'=>false
            ]);
     }
     else{
        return response()->json([
            'codevrais'=>false,'error_exist'=>false
            ]);
     }
   
 }
 


 function modalcode(Request $request){
    error_log('modalcode ----------');
    $validator = $this->validation($request,$this->coderules);  

    if($validator->fails()){
        error_log('id fail modalcode ----------');

        return $this->failcode($validator);   
    }
    else{
        error_log('id succecc modalcode ----------');

        return  $this->successcode($request,$validator);
    }
 }
 


 public $newpasswordrules=['password', 'min:8', 'password_confirmation', 'same:password'];


 public function  successnewpassword($request,$validator){
    error_log('successc ------- new password ---');
error_log($request->Modal);
if($request->Modal=='Admin'){
    $user=Admin::where('email','=',$request->email)->first();   

}else{
    $user=User::where('email','=',$request->email)->first();   

}

    
   
    $user->password= Hash::make($request->password);
    $user->save();
        return response()->json([
            'error_exist'=>false, "Modal"=>$request->Modal
            ]);
 
   
 }
 


 public function  failnewpassword($validator){
    error_log('faillle --new password--------');
   return response()->json([
       'error'=>$validator->errors(),'error_exist'=>true
   ]);
}


 function newpassword(Request $request){
    $validator = $this->validation($request,$this->newpasswordrules);  

    if($validator->fails()){
        error_log('id fail new password ----------');

        return $this->failnewpassword($validator);   
    }
    else{
        error_log('id succecc new password  ----------');

        return  $this->successnewpassword($request,$validator);
    }
 }
}

































   // switch ($request->Modal) {
        //     case 'User':
        //         $user=User::where('email','=',$request->email)->first();
        //         break;
        //     case 'Admin':
        //         $user=Admin::where('email','=',$request->email)->first();
        //         break;
        //     case 'SuperAdmin':
        //         $user=SuperAdmin::where('email','=',$request->email)->first();
        //         break;
        //  }


                 //$user=User::where('email','=',$request->email)->first();
       
       
       
       
                 // $rules=[ 
        //     'email'=>[
        //        'required', 
        //        ],
        //    'password'=>[
        //        'min:7|required', 
       
        //    ]];
    
     //   $validator = Validator::make($request->all(), $this->rules('email','required','password','min:7|required') );


       // error_log('store0------------------------------------------');
        // error_log($request->email);
        // error_log($validator->errors());

        //  error_log($request->Modal);


         // error_log('user------------------------------------------');

                // //if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

                    // error_log('store0------------------------------------------');
                // error_log('in user------------------------------------------');

                // error_log('store0------------------------------------------');

                                    // error_log('compt inexist');
                                    // error_log('compt exist');

            // if($user){
            //         if (Hash::check($request->password, $user->password)) {
            //         // The user is active, not suspended, and exists.
            //             return response()->json([
            //                 'exist_password'=>true,'exist'=>true,"error_exist"=>false, 'gexist'=>true
            //             ]);
            //         }
            //         else{
            //             return response()->json([
            //                 'gexist'=>true,"error_exist"=>false, 'exist_password'=>false
            //             ]);
            //         }
            // }
            // else{
            //     return response()->json([
            //         'gexist'=>false,'exist_password'=>false,"error_exist"=>false
            //     ]);
            // }
       // if($user){
            //     $gexist=true;
            // }
            // else{
            //     $gexist=false;

            // }
            // return response()->json([
            //          'error'=>$validator->errors(),"error_exist"=>true, 'gexist'=> $gexist
            //      ]);


    // for ($i = 0; $i < func_num_args(); $i=$i+2) {
    //     $conditions[$args[$i]]=[$args[$i+1]];
    // }