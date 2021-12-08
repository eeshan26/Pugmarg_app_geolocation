<!DOCTYPE html>
<html>
<head>
    <title> Add Geofence</title>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0mRh43eX0XjERENXqJ04xzFQmOYmOeRw&libraries=places" type="text/javascript"></script>
    <!-- <script src= "https://maps.googleapis.com/maps/api/js?key=AIzaSyBqYBIUiBQkBS8Ck0gzAtQwRtSOibce0RU&libraries=places,geometry,drawing" type="text/javascript"></script> -->
    
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    
    <style>
      #map-canvas{
        /* position:absolute; */
        /* top:220px; */
        width:1200px;
        height:500px;
        /* margin-top:20px; */
        /* z-index: -1; */
      }
    </style>
</head>
<body>

<div>
  <div>
    <form action="/update_geofencedata" method="POST">
      @csrf
      <div class="container">
          <h1>Add Geofence</h1>
          <hr>

          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control input-sm" name="title">
          </div>

          <div class="form-group">
            <label for="">Site Id</label>
            <input type="text" class="form-control input-sm" name="site_id">
          </div>

          <div class="form-group">
            <label for="">Client Id</label>
            <input type="text" class="form-control input-sm" name="client_id">
          </div>

          <div class="form-group">
            <label for="">Search</label>
            <input type="text" id ="searchmap">
            <div id="map-canvas"></div>
          </div> 
          
          <div class="form-group" style="display:none;">
            <label for="">Lat</label>
            <input type="text" class="form-control input-sm" name="lat" id="lat">
          </div>

          <div class="form-group" style="display:none;">
            <label for="">Lng</label>
            <input type="text" class="form-control input-sm" name="lng" id="lng">
          </div>

          <div class="form-group">
            <label for="">Center</label>
            <input type="text" class="form-control input-sm" name="center" id="center">
          </div>

          <div class="form-group">
            <label for="">Radius</label>
            <input type="text" class="form-control input-sm" name="radius" id="radius">
          </div>
          <!-- <div class="slidecontainer" style="display:inline;">
            <input type="myRange" min="1" max="3000" value="500" class="slider" id="myRange" style="display:inline;">
            <p style="display:inline;">Radius:
              <span id="demo" style="display:inline;"></span>
            </p>
          </div> -->
          <input type="range" class="custom-range" id="customRange1" value="20" style="width:50%;">


          <hr>
          
          <button type="submit" class="btn btn-sm btn-danger" style="margin-left:15px;">Save</button>
      </div>
    </form> 
  </div>
</div>

</body>
</html>



<!-- <script>
$( "#myslider" ).slider();
</script> -->

<script>
// function init() {
    var circle;
    var mapCenter = new google.maps.LatLng(21.146633, 79.088860);
    var lat=mapCenter.lat;
    var lng=mapCenter.lng;
    var radius=100;
    //printing default values
    $('#lat').val(lat);
    $('#lng').val(lng);
    $('#radius').val(radius);
    
    var map=new google.maps.Map(document.getElementById('map-canvas'),{
      center:mapCenter,
      zoom:15,
    });
    var marker = new google.maps.Marker({
      position:mapCenter,
      map:map,
      draggable:true,
    });

    var db_center= '{"lat":'+marker.getPosition().lat()+',"lng":'+marker.getPosition().lng()+"}";
    $('#center').val(db_center);

    circle= new google.maps.Circle({
      
      center:mapCenter,
      map:map,
      radius:100,
      strokeColor:"#FF0000",
      strokeOpacity: 0.8,
      strokeWeight: 2,
      editable:true,
    });

    google.maps.event.addListener(circle, "radius_changed", function(){
      var radius= circle.getRadius();
      var lat= marker.getPosition().lat();
      $('#radius').val(radius);
    });
    google.maps.event.addListener(circle, "center_changed", function(){
      document.getElementById("radius").innerHTML = circle.getCenter();
    });

    var searchBox =new google.maps.places.SearchBox(document.getElementById('searchmap'));

    google.maps.event.addListener(searchBox,'places_changed',function(){
      var places=searchBox.getPlaces();
      var bounds=new google.maps.LatLngBounds();
      var i,place;

      for(i=0;place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location);
      }
      map.fitBounds(bounds);
      map.setZoom(15);
    });

    google.maps.event.addListener(marker,'position_changed',function(){
      var lat= marker.getPosition().lat();
      var lng= marker.getPosition().lng();
      $('#lat').val(lat);
      $('#lng').val(lng);
      var db_center= '{"lat":'+marker.getPosition().lat()+',"lng":'+marker.getPosition().lng()+"}";
      $('#center').val(db_center);
    });
    circle.bindTo('center', marker, 'position');  

    google.maps.event.addListener(map,'click',function(event){
      // marker.setPosition(event.LatLng);
      placeMarker(event.latLng);
    });

    // var rangeslider= document.getElementById("myRange");

    // rangeslider.oninput=function(){
    //   radius= +rangeslider.value;
    //   if (circle){
    //     circle.setMap(null);
    //   }
    //   circle= new google.maps.Circle({
      
    //   center:mapCenter,
    //   map:map,
    //   radius:100,
    //   strokeColor:"#FF0000",
    //   strokeOpacity: 0.8,
    //   strokeWeight: 2,
    //   editable:true,
    // });
    // }

    $('#customRange1').change(function() {
      var new_rad = $(this).val();
      var rad = new_rad *10; //* 1609.34;
      if (!circle || !circle.setRadius) {
        circle = new google.maps.Circle({
          map: map,
          radius: rad,
          fillColor: '#555',
          strokeColor: '#ffffff',
          strokeOpacity: 0.1,
          strokeWeight: 3
        });
        circle.bindTo('center', marker, 'position');
      } 
      else circle.setRadius(rad);
    });

    function placeMarker(location) {
    if (marker == null)
    {
          marker = new google.maps.Marker({
              position: location,
              map: map
          }); 
    } 
    else 
    {
        marker.setPosition(location); 
        map.setZoom(15);
        map.setCenter(marker.getPosition());
    } 
};


//         $("#myslider").slider({
//         orientation: "vertical",
//         range: "min",
//         max: 3000,
//         min: 100,
//         value: 500,
//         slide: function(event, ui) {
//             updateRadius(circle, ui.value);
//         }
//     });
// }
// function updateRadius(circle, rad) {
//     circle.setRadius(rad);
// }

// google.maps.event.addDomListener(window, 'load', init);

//   var slider=document.getElementById("myRange");
//   var output= document.getElementById("demo");
//   output.innerHTML=slider.value;
//   slider.oninput=function(){
//     output.innerHTML = this.value;
//     circle.setRadius(this.value);
//   }
// }
// function myFunction(){
//   var x=document.getElementById("myRange");
//   alert(x);
// }
// }
</script>

