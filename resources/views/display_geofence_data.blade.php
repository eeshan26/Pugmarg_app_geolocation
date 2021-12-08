<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <title>Geofence data</title>
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
            <h1>Geofence data</h1>
            <hr>
            <div class="line" style="text-align:right;">
                <a href="/addGeofenceData" class="btn btn-primary">Add Geofence</a>
            </div><br>
            <!-- <div class="line" style="text-align:right;">
                <a href="/addData" class="btn btn-primary">Add geofence data</a>
            </div><br> -->
            <form>
                <table id="geofence_data_table" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Name</th>
                            <th>Center</th>
                            <th>Radius</th>
                            <th>EDIT</th>
                            <th>UPDATE</th>
                            <th>Location</th>
                            <!-- <th>DELETE</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $row)
                        <tr style= "background:white;">
                            <td>{{$row->name}}</td>
                            <td>{{$row->center}}</td>
                            <td>{{$row->radius}}</td>
                            <td>
                                <a href="click_geofence_edit/{{$row->id}}" class="btn btn-success">Edit</a> 
                            </td>
                            <td>
                                <a href="click_geofence_update/{{$row->id}}" class="btn btn-success">Update</a> 
                            </td>
                            <td>
                                <a href="click_showmap/{{$row->id}}" class="btn btn-success">Location</a> 
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
                $('#geofence_data_table').DataTable();
            } );
    </script>
</body>
</html>