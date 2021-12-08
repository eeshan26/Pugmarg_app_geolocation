<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Edit registration</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="/update/{{$user[0]->id}}" method="POST">
@csrf
<div class="container">
    <h1>Update</h1>
    <p>Please fill this form to edit registration info.</p>

    @if(count($errors))
			<div class="alert alert-danger">
				<strong>Whoops!</strong> There were some problems with your input.
				<br/>
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
    <hr>

    <label for="firstName"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstName" id="firstName" value="{{$user[0]->firstName}}" required>

    <label for="lastName"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastName" id="lastName" value="{{$user[0]->lastName}}" required>

    <label for="department"><b>Department</b></label>
    <input type="text" placeholder="Enter department" name="department" id="department" value="{{$user[0]->department}}" required>

    <label for="designation"><b>Designation</b></label>
    <input type="text" placeholder="Enter designation" name="designation" id="designation" value="{{$user[0]->designation}}"  required>

    <label for="company_id"><b>Company id</b></label>
    <input type="int" placeholder="Enter Company id" name="company_id" id="company_id" value="{{$user[0]->company_id}}" required>

    <label for="company_name"><b>Company name</b></label>
    <input type="text" placeholder="Enter Company name" name="company_name" id="company_name" value="{{$user[0]->company_name}}" required>

    <label for="supervisor_id"><b>Supervisor id</b></label>
    <input type="int" placeholder="Enter supervisor id" name="supervisor_id" id="supervisor_id" value="{{$user[0]->supervisor_id}}" required>

    <label for="supervisor_name"><b>Supervisor name</b></label>
    <input type="text" placeholder="Enter Supervisor name" name="supervisor_name" id="supervisor_name" value="{{$user[0]->supervisor_name}}" required>

    <label for="mobile"><b>Mobile number</b></label>
    <input type="text" placeholder="Enter mobile number" name="mobile" id="mobile" value="{{$user[0]->mobile}}" required>
    <span class="text-danger">{{ $errors->first('mobile') }}</span><br>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter email" name="email" id="email" value="{{$user[0]->email}}" required>
    <span class="text-danger">{{ $errors->first('email') }}</span><br>

    <label for="role_id"><b>Role id</b></label>
    <input type="int" placeholder="Enter role id" name="role_id" id="role_id" value="{{$user[0]->role_id}}" required>

    <label for="registrationFlag"><b>Registration Flag</b></label>
    <input type="int" placeholder="Enter registration flag" name="registrationFlag" id="registrationFlag" value="{{$user[0]->registrationFlag}}" required>

    <label for="otp"><b>OTP</b></label>
    <input type="text" placeholder="Enter OTP" name="otp" id="otp" value="{{$user[0]->otp}}" required>

    <hr>
    <button type="submit" class="registerbtn">Update Data</button>
</div>

</form>
</body>
</html>