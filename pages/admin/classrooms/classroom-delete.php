<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);

  $sql = "DELETE FROM classrooms WHERE id = ?";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  header("Location: index.php?page=classrooms");
}
?>