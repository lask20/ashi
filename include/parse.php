<?php
require 'vendor/autoload.php';
session_start();

use Parse\ParseClient;
use Parse\ParseSessionStorage;

 
ParseClient::initialize('p8k9QuDshK6V5fJ6MG1deZ7Oj41KwMxdYGHt8wW7', 'mDEmNJPBIBI0MK6B2VIqK6NkvBv7Kdk4SzKNxDFx', 'iOtSMAIsjI0qcIgp2iMk5dyr3rTLtllPAxmxfeTo');
ParseClient::setStorage( new ParseSessionStorage() );

?>

