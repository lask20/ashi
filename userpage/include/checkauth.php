<?php

include "parse.php";
use Parse\ParseUser;
use Parse\ParseException;

$currentUser = ParseUser::getCurrentUser();
if (!$currentUser) {
    header('Location: ../login.php');
}

?>