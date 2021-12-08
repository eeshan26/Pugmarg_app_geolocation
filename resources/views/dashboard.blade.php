<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app1.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
    @if(\Session::has('success'))
        <br>
        <div class="alert alert-success" role="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>  
    @endif
    <div class="container">
        <div class="row justify-content-md-center">
        <!-- <div class="row" style="height:180px;">
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Registration</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Users</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> 
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Departments</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Geofences</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </div>
        </div> -->
        <div class="col col-md-3">
            <a href="/displaydata">
                <button class="btn1" id="b1"> Registration Data</button>
            </a>
        </div> 
        <div class="col col-md-3"> 
            <a href="/display_user_data">
                <button class="btn1" id="b2">Users</button>
            </a>
        </div>
        <div class="col col-md-3">
            <a href="/display_department_data">
                <button class="btn1" id="b3">Departments</button>
            </a>
        </div>
        <div class="col col-md-3">
            <a href="/display_geofence_data">
                <button class="btn1" id="b4">Geofence</button>
            </a>
        </div>
    </div>
</body>
</html>