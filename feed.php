<?php
include "include/parse.php";
use Parse\ParseQuery;

$query = new ParseQuery("NotiData");

// Get a specific object:
//$query->equalTo("user", $currentUser);
$query->descending("createกAt");
$object = $query->first();

echo $object->get("message");
?>