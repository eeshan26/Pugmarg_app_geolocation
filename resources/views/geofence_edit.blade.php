<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Edit Geofences</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="/update_geofence_data/{{$user[0]->id}}" method="POST">
@csrf
<div class="container">
    <h1>Update</h1>
    <p>Please fill this form to edit user info.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="{{$user[0]->name}}" required>

    <label for="center"><b>Center</b></label>
    <input type="text" placeholder="Enter center" name="center" id="center" value="{{$user[0]->center}}" required>

    <label for="radius"><b>Radius</b></label>
    <input type="int" placeholder="Enter radius" name="radius" id="radius" value="{{$user[0]->radius}}" required>

    <hr>
    <button type="submit" class="registerbtn">Update geofence data</button>
</div>

</form>
</body>
</html>