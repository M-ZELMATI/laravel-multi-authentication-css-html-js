




  
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Free Web tutorials" />
    <meta name="keywords" content="HTML, CSS, JavaScript" />
    <meta name="author" content="John Doe" />
    <meta name="viewport" content=
        "width=device-width, initial-scale=1.0" />



        <!-- token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

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
   .fa {
  padding: 7px;
  font-size: 24px;
  width: 100%;
  text-align: center;
  text-decoration: none;
  margin: 2px 1px;
  border-radius: 6px ;
}
.fa-facebook {
  background: #3B5998;
  color: white;
}
a:hover{
    text-decoration:none;
    color:white;
}
.fa-google {
  background: #dd4b39;
  color: white;
}

  </style>
</head>
  
<body>
    <div class="container register">
  
        <h2>Linked<span>
            <i class="fab fa-linkedin"></i>
        </span></h2>
        <div class="text">
            <h1>Sign in</h1>
            <p>Stay updated on your professional world</p>
        </div>
        <form method="POST"  action="{{ route('register') }}" id='upload_form'  enctype="multipart/form-data">
        <!-- action="{{ route('login') }}"  -->
            @csrf
        <div class="your-input">
            <div class="input">
                <input type="text" id='name' name="name" :value="old('name')" required autofocus />
                <label for="name">Name</label>
            </div>
             <!-- error name -->
             <small class="text-danger " style='margin-top:-5px; margin-bottom:3px' id='error_name'></small>

             <div class="input">
                <input type="email" id='email' name="email" :value="old('email')" required />
                <label for="name">Email</label>
            </div>
             <!-- error email -->
             <small class="text-danger " style='margin-top:-5px; margin-bottom:3px' id='error_email'></small>

            
            
            <div class="input">
                <input type="password" name="password"  id="password" required />
                    <i id='eye' style='display:none' ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                         <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                        <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                        </svg>
                    </i>
                    <i id='eyehide' >
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash-fill" viewBox="0 0 16 16">
                          <path d="m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                          <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z"/>
                        </svg>
                    </i>

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

        </div>
         </form>
      
       

        <button  name="upload" id="uploaduserregister"  data-token="{{ csrf_token() }}"  >Sign up</button>
        <p class="join-link">
            You have accont?
            <a href="#" class="join-now">
                Sing in now
            </a>
            
        </p>
        <div class="separator">OR</div>
        <a href="#" class="fa fa-google">     Google</a>

        <a href="#" class="fa fa-facebook ">   Facebook</a>



    </div>
    
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="{{URL::asset('js/test.js')}}"></script>

<script type="text/javascript">


</script>