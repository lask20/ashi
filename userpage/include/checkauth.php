<?php

include "parse.php";
use Parse\ParseUser;
use Parse\ParseException;

$currentUser = ParseUser::getCurrentUser();
if (!$currentUser) {
	if (!$currentUser->get('verifed')) {
		header('Location: notApproval.html');
		exit;
	}
    header('Location: ../login.php');
    exit;
}

?>