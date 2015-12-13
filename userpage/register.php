<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.S.H.I | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
    <style>
      html, body {
        height: 50%;
        margin: 0;
        padding: 0;
        background-color: #E6E6E6;
      }
      #map {
        min-height: 400px;
        min-width: 20%;
        border:2px solid white;
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 1%;
        margin-bottom: 2%;

      }
      .wrappp{

        margin-top: 3%;
        margin-left: 30%;
        margin-right: 30%;
        height:auto;
     
      }
      .wrapB{
        width:400px;
        height:auto;
        margin:auto;
        margin-bottom:10px;
        text-align: center;
        position:relative;
      }

    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <div class="wrappp">
  <div class="register-logo">
        <b>A.S.H.I.</b>&nbsp;Register
    </div>
  <form action="#" method="post">
          <label for="exampleInputFile">Profile Picture</label>
          <input type="file" id="exampleInputFile"></br>
          <input name="NorthEastLat" type="hidden" id="NorthEastLat">
          <input name="NorthEastLng" type="hidden" id="NorthEastLng">
          <input name="SouthWestLat" type="hidden" id="SouthWestLat">
          <input name="SouthWestLng" type="hidden" id="SouthWestLng">

          <div class="form-group has-feedback">
            <input name="email" type="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="repassword" type="password" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="fullname" type="text" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input name="phone" type="text" class="form-control" placeholder="Phone number">
            <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <textarea name="address" class="form-control" rows="3" placeholder="Address"></textarea>
            <span class="glyphicon glyphicon-home form-control-feedback"></span>
          </div>
           <b>Location</b>&nbsp;&nbsp;( select area )
  </div>

            <div id="map"></div>

    <script>

// This example adds a user-editable rectangle to the map.
// When the user changes the bounds of the rectangle,
// an info window pops up displaying the new bounds.

var rectangle;
var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: 13.7777, lng: 100.4000},
    zoom: 10
  });

  var bounds = {
    north: 13.7500,
    south: 13.6000,
    east: 100.5500,
    west: 100.4000
  };

  // Define the rectangle and set its editable property to true.
  rectangle = new google.maps.Rectangle({
    bounds: bounds,
    editable: true,
    draggable: true
  });

  rectangle.setMap(map);

  // Add an event listener on the rectangle.
  rectangle.addListener('bounds_changed', showNewRect);

  // Define an info window on the map.
  infoWindow = new google.maps.InfoWindow();
}
// Show the new coordinates for the rectangle in an info window.

/** @this {google.maps.Rectangle} */
function showNewRect(event) {
  var ne = rectangle.getBounds().getNorthEast();
  var sw = rectangle.getBounds().getSouthWest();

  $("#NorthEastLat").val(ne.lat());
  $("#NorthEastLng").val(ne.lng());
  $("#SouthWestLat").val(sw.lat());
  $("#SouthWestLng").val(sw.lng());

  var contentString = '<b>Rectangle moved.</b><br>' +
      'New north-east corner: ' + ne.lat() + ', ' + ne.lng() + '<br>' +
      'New south-west corner: ' + sw.lat() + ', ' + sw.lng();

  // Set the info window's content and position.
  infoWindow.setContent(contentString);
  infoWindow.setPosition(ne);

  infoWindow.open(map);
}

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeQIal1IZm15eZ4iDBkOKDqjNRTTNirxU&callback=initMap&signed_in=true" async defer>
    </script>


              <div class="wrapB"><button class="btn btn-block btn-primary btn-lg">Register</button></div>


</form>
       

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>

  </body>
</html>
