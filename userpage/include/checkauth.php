<?php

include "parse.php";
use Parse\ParseUser;
use Parse\ParseException;

$currentUser = ParseUser::getCurrentUser();

if (!$currentUser) {
	
    header('Location: ../login.php');
    exit;
}
if ($currentUser->get('approve') == 0) {
		header('Location: notApproval.html');
		exit;
	}

?>