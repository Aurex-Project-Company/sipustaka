<?php
require_once "config/database.php";

$name = "admin";
$email = "admin@mail.com";
$password = password_hash("admin123", PASSWORD_BCRYPT);

$sql = "INSERT INTO users(name, email, password, status) VALUES ('$name', '$email', '$password', '1')";
$stmt = mysqli_query($connect, $sql);

mysqli_close($connect);
?>