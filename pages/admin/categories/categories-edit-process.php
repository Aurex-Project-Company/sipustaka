<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars($_POST["description"]);

  $error = [];
  if (empty($name)) {
    $error["name"] = "Nama Kategori harus diisi";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=categories-edit&id=<?= encryptId($id) ?>");
    exit;
  }

  if (empty($error)) {
    $query = "UPDATE categories SET name = ?, description = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ssi", $name, $description, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=categories");
    exit;
  }
}
?>