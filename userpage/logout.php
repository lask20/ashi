<?php
include "include/parse.php";
use Parse\ParseUser;
use Parse\ParseException;

ParseUser::logOut();

header('Location: ../');

?>