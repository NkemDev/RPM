<?php
$dbuser="root";
$dbpass="";
$host="localhost";
$dbname = "rps";
$mysqli = mysqli_connect($host, $dbuser, $dbpass, $dbname);
@$mysqli = mysqli_connect($host, $dbuser, $dbpass, $dbname);
if (!$mysqli){
    die("Could not connect to the database: ".mysqli_connect_error());
}
?>