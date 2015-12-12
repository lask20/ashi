<?php
include "include/checkauth.php";
use Parse\ParseQuery;

$query = new ParseQuery("NotiData");

// Get a specific object:
$query->equalTo("user", $currentUser);

$query->limit(30); // default 100, max 1000

$results = $query->find();

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
	<title>A.S.H.I.| Message History</title>
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
						<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
					<li ><a href="sendmsg.php"><i class="fa fa-envelope"></i> <span>Send Message</span></a></li>
					<li class="active"><a href="#"><i class="fa fa-clock-o"></i> <span>History</span></a></li>
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
					History
				</h1>

			</section>

			<!-- Main content -->
			<section class="content">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">Responsive Hover Table</h3>
						<div class="box-tools">
							<div class="input-group" style="width: 150px;">
								<input type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
								<div class="input-group-btn">
									<button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table class="table table-hover">
							<tbody><tr>
								<th>Date</th>
								<th>Priority</th>
								<th>Message</th>
							</tr>
							<?php


							for ($i = 0; $i < count($results); $i++) {
								$object = $results[$i];
								$time = $object->getCreatedAt();
								$time->setTimezone(new DateTimeZone('Asia/Bangkok'));
								echo "<tr>";
								echo "<td>". $time->format('Y-m-d H:i:s') ."</td>";
								echo "<td><span class=\"label label-primary\">". $object->get('priority')." </span></td>";
								echo "<td>". $object->get('message') ."</td>";
								echo "</tr>";
							}
							?>
							<tr>

								<td>11-7-2014</td>
								<td><span class="label label-primary">Low</span></td>
								<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
							</tr>
							<tr>

								<td>11-7-2014</td>
								<td><span class="label label-success">medium</span></td>
								<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
							</tr>
							<tr>

								<td>11-7-2014</td>
								<td><span class="label label-warning">High</span></td>
								<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
							</tr>
							<tr>

								<td>11-7-2014</td>
								<td><span class="label label-danger">Critical</span></td>
								<td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
							</tr>
						</tbody></table>
					</div><!-- /.box-body -->
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
