



  
<head>
    <meta charset="UTF-8" />



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

  </style>
</head>
  
<body>
  
<div style=" width: 420px;
    background: #fff;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    flex-direction: column;
    justify-content: space-evenly;
    padding: 1rem;">
        <div class="card text-center">
         <div class="card-header">  Active your Email in your Email Box</div>
         <div class="card-body">
           <h5 class="card-title">Sheck boit of reception of your email accont</h5>
         
           <!-- <a href="/sendregister/{{ session()->get('id') }}"><button type="button" class="btn btn-primary">resend</button> </a> -->
           <a href="/sendregister/{{$comptid}}"><button type="button" class="btn btn-primary">resend</button> </a>

        </div>
</div>
       

    
        
      
    
</body>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="{{URL::asset('js/test.js')}}"></script>



<script type="text/javascript">
        window.onpopstate = function(event) {

            alert("refresh");
        }
</script>
 