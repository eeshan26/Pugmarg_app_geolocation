<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    @if(\Session::has('success'))
        <br>
        <div class="alert alert-success" role="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>
        <!-- <div class="alert">
            <h4>{{\Session::get('success') }}</h4>
        </div>   -->
    @endif
    <div class="container" >
        <div class="jumbotron">
            <h1>Registration data</h1>
            <hr>
            <div class="line" style="text-align:right;">
                <a href="/addData" class="btn btn-primary">Add registration data</a>
            </div><br>
            <form>
                <table id="registration_data_table" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>id</th>
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>Company id</th>
                            <th>Company name</th>
                            <th>Supervisor id</th>
                            <th>Supervisor name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Role id</th>
                            <th>registration flag</th>
                            <th>otp</th>
                            <th>Timestamp</th>
                            <th>EDIT</th>
                            <!-- <th>DELETE</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr style= "background:white;">
                            <td>{{$row->id}}</td>
                            <td>{{$row->firstName}}</td>
                            <td>{{$row->lastName}}</td>
                            <td>{{$row->department}}</td>
                            <td>{{$row->designation}}</td>
                            <td>{{$row->company_id}}</td>
                            <td>{{$row->company_name}}</td>
                            <td>{{$row->supervisor_id}}</td>
                            <td>{{$row->supervisor_name}}</td>
                            <td>{{$row->mobile}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->role_id}}</td>
                            <td>{{$row->registrationFlag}}</td>
                            <td>{{$row->otp}}</td>
                            <td>{{$row->timestamp}}</td>
                            <td>
                                <a href="click_edit/{{$row->id}}" class="btn btn-success">Edit</a> 
                            </td>
                            <!-- <td></td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {
                $('#registration_data_table').DataTable();
            } );
    </script>
</body>
</html>