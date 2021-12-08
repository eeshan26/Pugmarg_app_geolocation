<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Edit Department</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="/update_department_data/{{$user[0]->id}}" method="POST">
@csrf
<div class="container">
    <h1>Update</h1>
    <p>Please fill this form to edit user info.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="{{$user[0]->name}}" required>

    <label for="showInReport"><b>ShowInReport</b></label>
    <input type="int" placeholder="Enter showInReport" name="showInReport" id="showInReport" value="{{$user[0]->showInReport}}" required>

    <hr>
    <button type="submit" class="registerbtn">Update department data</button>
</div>

</form>
</body>
</html>