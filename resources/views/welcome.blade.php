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
        @if(session()->has('success'))

      <div class="alert alert-success" id="myDIV" role="alert">

          <strong>{{session()->get('success')}}</strong> 
      </div>
          @endif
    

      <h3><div>Signup Here</div></h3>

      
        <form action="{{url('/user-added')}}" method ="post" enctype="multipart/form-data">
        @csrf

            <div class="form-group col-md-6">
                <label ><strong>Name<span style='color:red'>*</span></strong></label>
                <input type="name" class="form-control" id="name" placeholder="Enter your Name" value="{{old('name')}}" name="name">
                <p class="text-danger">@error('name') {{$message}}@enderror</p>
               </div>
             <div class="form-group  col-md-6">
              <label ><strong>Mobile Number <span style='color:red'>*</span></strong></label>
              <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" value="{{old('phone')}}" placeholder="Enter Phone Number" name="phone">
              <small  class="form-text text-muted">We'll never share your phone with anyone else.</small>
              <p class="text-danger">@error('phone') {{$message}}@enderror</p>

             </div>
             <div class="form-group col-md-6">
              <label ><strong>Password<span style='color:red'>*</span></strong></label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password">
              <p class="text-danger">@error('password') {{$message}}@enderror</p>

             </div>
             <div class="form-group col-md-6">
                <label ><strong> Confirm Password<span style='color:red'>*</span></strong></label>
                <input type="password" class="form-control" id="confirm_password" placeholder=" This field should match with password" name="confirm_password">
              <p class="text-danger">@error('confirm_password') {{$message}}@enderror</p>

              </div>
           <br>     
            <button type="submit" class="btn btn-outline-primary">Submit</button>
            <br>
            <br>
            <br>
            

          </form>
          <a href="{{url('/login')}}"><button type="submit" class="btn btn-outline-warning">Login Here</button></a>
      
    </body>
</html>
