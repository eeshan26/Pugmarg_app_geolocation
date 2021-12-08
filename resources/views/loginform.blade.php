<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{url('/css/registration_form.css')}}">
    <title>Login</title>
</head>
<body>
    @if(\Session::has('success'))
    <div class="alert">
        <h4>{{\Session::get('success') }}</h4>
    </div>  
    @endif
<form action="signin" method="POST">
@csrf
<div class="container">
    <h1>Login</h1>
    <p>Please enter credentials to login.</p>
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

    <label for="contact"><b>Contact</b></label>
    <input type="text" placeholder="Enter contact" name="contact" id="contact" required>
    <span class="text-danger">{{ $errors->first('contact') }}</span><br>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="password" id="password" required>

    <hr>
    <button type="signin" class="registerbtn">Login</button>
</div>

</form>
</body>
</html>