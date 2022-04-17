<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "svetlana";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()) {
    die("Error connecting to db");
}
$conn->query("SET NAMES 'utf8'");
