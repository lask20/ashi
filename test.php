<?php
require 'vendor/autoload.php';
 
use Parse\ParseClient;
 
ParseClient::initialize('p8k9QuDshK6V5fJ6MG1deZ7Oj41KwMxdYGHt8wW7', 'mDEmNJPBIBI0MK6B2VIqK6NkvBv7Kdk4SzKNxDFx', 'iOtSMAIsjI0qcIgp2iMk5dyr3rTLtllPAxmxfeTo');


use Parse\ParseObject;
 
$testObject = ParseObject::create("TestObject");
$testObject->set("foo", "bar");
$testObject->save();

?>