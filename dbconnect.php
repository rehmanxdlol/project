<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "kLAoi9o5afCf9C";
$dbname = "login";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

