<!DOCTYPE html>


<html lang="en" dir="ltr">
  <head>
  <link rel="icon" href="dist/img/E.png">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
   
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
  

  </head>
  <body>
  {!! Toastr::message() !!}

<div>
    <div class="container"> 
    <img src="dist/img/Logo_orig.png" alt="Responsive Image" style="width: 50%; height: 10%; margin-left: 58%; margin-top: 10rem;"> 
      <div class="wrapper">
        <div class="title"><span>Login Form</span></div>
        <form class="user" action="{{route('login')}}" method=" ">
          <div class="row form-group">
            <input type="text"  placeholder="Username" required name="username">
          </div>
          <div class="row form-group">
            <input type="password" placeholder="Password" required name="password">
          </div>
          <div class="row button">
            <input type="submit" value="Login">
          </div>
        </form>
      </div>
    </div>
</div>
  </body>
</html>



