<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <h3>HELLO, Welcome {{Auth::user()->name}}</h3>


    

    <div class="col-md-9">
        <form action="{{url('/search')}}" method="get" class="top-search">
            <input type="text" class="form-control" name="name" value="{{ app('request')->input('name') }}" placeholder="Student Name">
            
            <input type="hidden" name="type" value="prospects">
            <button type="submit" class="btn btn-outline-info searchbtnsinto">Search</button>
            
        </form>
    </div>




    <table class="table table-striped table-bordered" id="bootstrap-data-table-export">

        <thead class="thead-dark">

        <tr>

            <th scope="col">S. No.</th>

            <th scope="col">Name</th>

            <th scope="col">Phone Number</th>

           

        </tr>

        </thead> 

        <tbody>

            <?php if($users){ 

                foreach ($users as $key => $user) {  ?>                                          

                <tr>

                    <td>{{$key+1}}</td>

                    <td>{{$user->name}} </td>

                    <td>{{$user->phone}}</td>

                   

                                                     

                </tr>
             <?php }}?>
                                             

        </tbody>

    </table>   
    <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-info">Log-out</button></a>                                

</body>
</html>









