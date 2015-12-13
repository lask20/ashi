<?php

include "include/parse.php";
use Parse\ParseUser;
use Parse\ParseException;
use Parse\ParseQuery;

$currentUser = ParseUser::getCurrentUser();

if (empty($currentUser)) {
  header('Location: ../login.php');
  exit;
}
if ($currentUser->get('role') !== "admin") {
  header('Location: ../login.php');
  exit;
}
if (empty($_GET['username'])) {
  exit;
}

$query = new ParseQuery("_User",$currentUser);
$query->EqualTo("username", $_GET['username']);

$results = $query->first();
$location = $results->get('location');
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>A.S.H.I. | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
        margin-left: 5%;
        margin-right: 5%;
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
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A.S.H.I.</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>A.S.H.I.</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
              <!-- Control Sidebar Toggle Button -->
             
            
          
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p>Admin</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">Menu Bar</li>
             <li class="active"><a href="?"><i class="fa fa-check-square-o"></i> <span>Confirm Registration</span></a></li>
            <li><a href="#"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Member Detail
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
      <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Detail</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="post" action="confirmRegis.php" role="form">
                  <div class="box-body">
                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Email address</label>
                      <input name="email" value="<?php echo $results->get('email') ?>" type="email" class="form-control" placeholder="eiei@eueu.com" disabled="">
                      <input name="username" value="<?php echo $results->get('email') ?>" type="hidden">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Full Name</label>
                      <input value="<?php echo $results->get('fullName') ?>" type="text" class="form-control" placeholder="Full Name" disabled="">
                      <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Phone</label>
                      <input value="<?php echo $results->get('phone') ?>" type="text" class="form-control" placeholder="0891548123" disabled="">
                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                    </div>
                     <div class="form-group has-feedback">
                      <label for="exampleInputEmail1">Address</label>
                      <textarea value="<?php echo $results->get('address') ?>" class="form-control" rows="3" placeholder="Address" disabled=""></textarea>
                      <span class="glyphicon glyphicon-home form-control-feedback"></span></br>
                       <label for="exampleInputEmail1">Location</label>
                    </div>
                    
                  </div><!-- /.box-body -->

                    <div id="map"></div>
                  <div class="box-footer">
                    <button name="button" value="deny" class="btn btn-danger btn-lg"><i class="fa fa-trash-o"></i> Deny</button>  <div class="pull-right"><button name="button" value="accept" class="btn btn-success btn-lg"><i class="fa fa-check"></i> Accept</button></div>
                  </div>

                </form>
              </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

      
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- page script -->


      <script>

// This example adds a user-editable rectangle to the map.
// When the user changes the bounds of the rectangle,
// an info window pops up displaying the new bounds.

var rectangle;
var map;
var infoWindow;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: <?php echo $location[0]->getLatitude() ?>, lng: <?php echo $location[0]->getLongitude()?>},
    zoom: 13
  });

  var bounds = {
    north: <?php echo $location[0]->getLatitude() ?>,
    south: <?php echo $location[1]->getLatitude() ?>,
    east: <?php echo $location[0]->getLongitude()?>,
    west: <?php echo $location[1]->getLongitude() ?>
  };

  // Define the rectangle and set its editable property to true.
  rectangle = new google.maps.Rectangle({
    bounds: bounds,
    editable: false,
    draggable: false

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

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js"></script>

  </body>
</html>
