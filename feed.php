<?php
include "include/parse.php";
use Parse\ParseQuery;

$query = new ParseQuery("NotiData");

// Get a specific object:
//$query->equalTo("user", $currentUser);
$query->descending("createdAt");
$object = $query->first();

echo $object->get("fullname")." : ".$object->get("message");
?>