<?php

include "include/parse.php";
use Parse\ParseUser;
use Parse\ParseException;

$status = "";
if (!empty($_POST['username'])) {
try {
  $user = ParseUser::logIn($_POST['username'], $_POST['password']);
    echo "success";
} catch (ParseException $error) {
  $status = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';
  $status .= $error->getMessage();
  $status .= '</div>';
    //echo $error->getMessage();
}
}

$currentUser = ParseUser::getCurrentUser();
if ($currentUser) {
  if ($currentUser->get("role") == "admin") {
    header('Location: userpage/confirmRegis.php');
    exit;
  }

    header('Location: userpage/sendmsg.php');
    exit;
} else {

}




?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->


    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="userpage/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="//www.parsecdn.com/js/parse-1.6.7.min.js"></script>
    <script src="js/ie-emulation-modes-warning.js"></script>
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>x
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
     
                    
                    
                    <?php echo $status; ?>
                  
      <form method="post" class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        
        <label for="username" class="sr-only">Email address</label>
        <input id="username" type="text" name="username" class="form-control" placeholder="Username" required="" autofocus="">
        <label for="password" class="sr-only">Password</label>
        <input id="password" type="password" name="password" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" >Login</button></br>
        <a href="register.php"><button class="btn btn-lg btn-primary btn-block" >Register</button></a>
      </form>
      


    </div> <!-- /container -->
  </body>
</html>
