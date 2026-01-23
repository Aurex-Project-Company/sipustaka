<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sipustaka";

$connect = mysqli_connect($hostname, $username, $password, $dbname);

if (!$connect) {
  die("Error : " . mysqli_connect_error());
}
?>