<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);

  $query = "DELETE FROM categories WHERE id = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);

  header("Location: index.php?page=categories");
}
?>