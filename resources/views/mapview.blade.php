<!DOCTYPE html>
<html>
<head>
    <title> Map</title>

    <style type="text/css">
      /* Set the size of the div element that contains the map */
    #map {
        height: 100vh;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }
    </style>
    
    <script type= "text/javascript"> 
      // Initialize and add the map
      var lat=<?php echo json_encode($lat);?>;
      var lng=<?php echo json_encode($lng);?>;
      var radius = <?php echo json_encode($radius);?>;
      function initMap() {
        
        // var center = new google.maps.LatLng(check["lat"], check["lng"]);


        const map = new google.maps.Map(document.getElementById("map"), {
        zoom: 17,
        center: {
          lat: lat,
          lng: lng,
        },
        });
        const markerLoc={lat:lat, lng:lng};
        const marker = new google.maps.Marker({
        position: markerLoc,
        map: map,
        });
        const radiusCircle= new google.maps.Circle({
          strokeColor: "#FF0000",
          strokeOpacity: 0.8,
          strokeWeight: 2,
          center: {
            lat: lat,
            lng: lng,
          },
          radius: radius,
          map: map,
        });
      };
    </script>
    
</head>
<body>
<h3></h3>
<p id="demo"></p>
<!--The div element for the map -->
<div id="map"></div>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!-- <script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA1ayw3PQ1sFLBFms-6LH0W1-kALQx0kpc&callback=initMap&libraries=&v=weekly"
    async
  ></script> -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD0mRh43eX0XjERENXqJ04xzFQmOYmOeRw&callback=initMap&libraries=places" type="text/javascript"></script>


</body>
</html>