<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "logowanie";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("nie udalo sie polaczyc");

}