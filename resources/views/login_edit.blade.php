<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Edit login</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="/update_userdata/{{$user[0]->id}}" method="POST">
@csrf
<div class="container">
    <h1>Update</h1>
    <p>Please fill this form to edit user info.</p>
    <hr>

    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" id="name" value="{{$user[0]->name}}" required>

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter contact" name="contact" id="contact" value="{{$user[0]->contact}}" required>

    <label for="company_id"><b>Company Id</b></label>
    <input type="text" placeholder="Enter company id" name="company_id" id="company_id" value="{{$user[0]->company_id}}" required>

    <label for="company_name"><b>Company Name</b></label>
    <input type="text" placeholder="Enter company name" name="company_name" id="company_name" value="{{$user[0]->company_name}}"  required>

    <label for="role_id"><b>Role id</b></label>
    <input type="text" placeholder="Enter role id" name="role_id" id="role_id" value="{{$user[0]->role_id}}" required>

    <label for="showUser"><b>Show user</b></label>
    <input type="int" placeholder="Enter show user" name="showUser" id="showUser" value="{{$user[0]->showUser}}" required>

    <hr>
    <button type="submit" class="registerbtn">Update user data</button>
</div>

</form>
</body>
</html>