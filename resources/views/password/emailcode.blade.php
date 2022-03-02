



  
<head>
    <meta charset="UTF-8" />



        <!-- token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Font Awesome-->
    <link rel="stylesheet" href=
        "https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity=
"sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
        crossorigin="anonymous" />
  
    <!--Style CSS-->
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
.codeemailenter{
   width: 500px;
    background: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding: 1rem;"
}
  </style>
</head>
  
<body>
  
<div class="codeemailenter">
        <div class="card text-center" >
          <div class="card-header" id="EnterYourEmail"> Enter Your Email Address</div>
          <div class="card-body">
            <div class="your-input" id="emailblockchangepassword">

              <div class="input">
             

                  <input type="email" id='email' name="email" :value="old('email')" required />
                  <input type="text" name="modal" id="modal" value="{{$modal}}" style='display:none'>
                  <label id="emaillabel" for="email">Email</label>
              </div>
               <!-- error email -->
  
              <small class="text-danger " style='margin-top:-5px; margin-bottom:3px' id='error_email'></small> 
              <div class="modal-footer" style="display: flex; justify-content: space-evenly;">

                <button  name="upload" id="uploadsemail"  data-token="{{ csrf_token() }}"> Address Email </button>
              </div>
            </div>

            <div class="your-input" style="display:none" id="passwordblockconfirmation">
           
              <div class="input">
                <input type="password" name="password"  id="password" required />
               
                <label for="password">
                        Password
                </label>
              </div>
                     <!-- error password -->
    
              <small class="text-danger" id='error_password'></small>
    
              <div class="input">
                <input type="password" name="password_confirmation"  class='password_confirmation' id="password_confirmation" required/>
                <label for="password">
                   Confirme Password
                </label>
              </div>
          
                         <!-- error password Confirmation -->
    
              <small class="text-danger" id='error_password_confirmation'></small>
              <div class="modal-footer" style="display: flex; justify-content: space-evenly;">
              <button  name="upload"  id="uploadspasswordchange"  data-token="{{ csrf_token() }}"> Change password </button>
              </div>
            </div>
       

          </div>
 
        </div>      

    
</div> 
    
    
<button type="button" class="btn btn-primary" style="display:none;" id="entercode" data-toggle="modal" data-target="#exampleModalCenter">
  Launch modal
</button>

<!-- Modal -->
   
<div class="modal fade" id="exampleModalCenter"  tabindex="-1" role="dialog" aria-labelledby="CodeModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="CodeModalCenterTitle">Enter Code Recived In Your Email</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="your-input">
            <div class="input">
                <input type="number" name="code" 
                    id="code" required />
                <label for="code">code</label>
            </div>
            
     </div>
     <small class="text-danger" id='error_code'></small>

      <div class="modal-footer">
        <button type="button" id="closemoalcod" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="uploadsmodalcode" class="btn btn-primary">Confirme</button>
      </div>
    </div>
</div>
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="{{URL::asset('js/test.js')}}"></script>



<script type="text/javascript">
     
</script>
 