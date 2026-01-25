<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $description = htmlspecialchars($_POST["description"]);

  $error = [];
  if (empty($name)) {
    $error["name"] = "Nama Kategori harus diisi";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=categories-add");
    exit;
  }

  if (empty($error)) {
    $sql = "INSERT INTO categories(name, description) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $description);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=categories");
    exit;
  }
}
?>