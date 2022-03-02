<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>

   
   
<div style="font-weight: bolder; background: grey; position: absolute; margin: 70px; justify-items: center; text-align: center; color:black">
<p style="justify-content: space-evenly; font-family: 'Roboto', sans-serif; text-align: center; justify-items: center;">If you cannot read this email, please click here Learn how to add us to your Safe Senders List!</p>
<div style="text-align: center; display: inline-block; justify-items: center; position: relative; justify-content: center; width: 70%; height: 90%px; background: #fff; box-sizing: border-box;">
          <p style="  justify-content: space-evenly;    font-family: 'Roboto', sans-serif;">
          Hi Mohamed,
  
          It’s been another crazy year, but with the holiday season approaching, we want to wish you and your loved ones nothing but lots of joy, good health, and good fortune.
          
          As we enter a new year, we’ll continue to be your go-to partner for digital commerce by creating new features and partnerships to help make managing your business payments even better. In the meantime, feel free to check out these key Payoneer highlights from the past year…
          </p>
          <br>
          <a href=" {{ url('http://127.0.0.1:8000/active/'.$details['id'].'') }}">
            <button style=" height: 50px; background: #0A66C3;outline: none; border: none; border-radius: 30px; color: #fff; font-size: 1rem;  font-weight: bolder;" >Active your email</button></a>
           <br>
            <p  style="  justify-content: space-evenly;    font-family: 'Roboto', sans-serif;">Happy holidays and we look forward to supporting your business even more in 2022! </p>
            <br>
            <hr>
            <div >   {{$details['title']}} {{$details['id']}}</div>
           <!-- <div class="card-body">
             <h5 class="card-title" style="color:green">Special title treatment</h5>
             <p class="card-text">
             {{$details['body']}} ------------------------  {{$details['id']}}
               With supporting text below as a natural lead-in to additional content.
             </p>
             <a href="http://127.0.0.1:8000/active/{{$details['id']}}" class="btn btn-primary">Active your email</a>
             <a href="{{ url('http://127.0.0.1:8000/active/'.$details['id'].'') }}" class="btn btn-primary">Active your email</a>
  
            
  
           </div>
           <div class="card-footer text-muted">2 days ago</div> -->
         <!-- </div> -->
  
      <!-- <h1>{{$details['body']}}</h1>
      <P>Enter this code in your Input</P>
      <a href="http://127.0.0.1:8000/">   <button class="btn btn-success" id="btnclick"> Active your email</button> </a> -->
  
  
    </div>
  
   
    </div>
 
</body>

</html>