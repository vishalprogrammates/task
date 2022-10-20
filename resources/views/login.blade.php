<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <title>Vishal's Task</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <h3><div>User Login</div></h3>
        @if(session()->has('error'))

      <div class="alert alert-error" id="myDIV" role="alert">

          <strong>{{session()->get('error')}}</strong> 
      </div>
          @endif
        <form action="{{url('/loggedin')}}" method ="post" enctype="multipart/form-data">
             @csrf
            <div class="form-group  col-md-6">
              <label >Phone <span style='color:red'>*</span></label>
              <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Enter Phone Number" name="phone">
              <p class="text-danger">@error('phone') {{$message}}@enderror</p>
             </div>
             <div class="form-group col-md-6">
              <label >Password<span style='color:red'>*</span></label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              <p class="text-danger">@error('password') {{$message}}@enderror</p>

             </div>
             
           <br>     
            <button type="submit" class="btn btn-outline-primary">Log in</button>
           
          </form>
          <br>
          <br>
         <a href="{{url('/')}}" ><button type="submit" class="btn btn-outline-info">New! Signup Here</button></a>
    </body>
</html>