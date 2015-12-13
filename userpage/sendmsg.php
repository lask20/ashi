<?php
include "include/checkauth.php";

use Parse\ParseInstallation;
use Parse\ParsePush;
use Parse\ParseObject;
use Parse\ParseQuery;
use Parse\ParseGeoPoint;

echo $currentUser->get("verifed");

$message = "";

if (!empty($_POST['message'])) {
  $message = $_POST['message'];
  

  // $user = new ParseQuery("_User",$currentUser);
  // $user->equalTo("username", $currentUser->getUsername());

  // $locationObj = $user->find();;
  // $location = $locationObj;

  
  $location = $currentUser->get('location');

  


  $query = ParseInstallation::query();
//$query->equalTo("channels", "Giants");
//$query->equalTo("scores", true);

  if (!empty($location)) {
    $sw = new ParseGeoPoint(floatval($location[1]->getLatitude()), floatval($location[1]->getLongitude()));
    $ne = new ParseGeoPoint(floatval($location[0]->getLatitude()), floatval($location[0]->getLongitude()));
    $query->withinGeoBox("location", $sw,$ne );
  }
    $query->containedIn("channels",array($_POST['priority']));
  

  ParsePush::send(array(
    "where" => $query,
    "data" => array(
      "badge" => "Increment",
      "alert" => $_POST['message']
      )
    ));

  $noti = new ParseObject("NotiData");
  $noti->set("message", $_POST['message']);
  $noti->set("priority", $_POST['priority']);
  $noti->set("user", $currentUser);
  $noti->save();


}
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>A.S.H.I.| Send Message</title>
  <!-- Tell the browser to be responsive to screen width -->
  <?php include "include/head.php" ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include "include/header.php" ?>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dist/img/User.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
           <p><?php echo $currentUser->getUsername(); ?></p>
           <!-- Status -->
           <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
         </div>
       </div>



       <!-- Sidebar Menu -->
       <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="#"><i class="fa fa-envelope"></i> <span>Send Message</span></a></li>
        <li><a href="history.php"><i class="fa fa-clock-o"></i> <span>History</span></a></li>
        <li><a href="logout.php"><i class="fa fa-power-off"></i> <span>Logout</span></a></li>

      </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Send Message
      </h1>
      <h1>
        <?php echo $message; ?>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
     <!-- quick email widget -->
     <div class="box box-info">
      <div class="box-header">
        <i class="fa fa-envelope"></i>
        <h3 class="box-title">Message</h3>
        <!-- tools box -->
        <div class="pull-right box-tools">
          <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
        </div><!-- /. tools -->
      </div>
      <div class="box-body">
        <form id="form_id" action="#" method="post">
          <div class="form-group">
            <label>Priority</label>
            <select name="priority" class="form-control">
              <option>Low</option>
              <option>Medium</option>
              <option>High</option>
              <option>Critical</option>

            </select>
          </div>
          <div>
            <textarea name="message" class="textarea" placeholder="Message" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
          </div>
          <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
          </form>
        </div>

      </div>
    </div>
    <!-- Your Page Content Here -->

  </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<?php include "include/control-sidebar.php" ?>


      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4 -->
    <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. Slimscroll is required when using the
         fixed layout. -->
       </body>
       </html>
