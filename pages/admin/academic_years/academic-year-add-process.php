<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $status = htmlspecialchars($_POST["status"]);

  $error = [];
  if (empty($name)) {
    $error["name"] = "Tahun Ajar harus diisi";
  }

  if (!isset($status)) {
    $error["status"] = "Status Tahun Ajar harus dipilih";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=academic-years-add");
    exit;
  }

  if (empty($error)) {
    $sql = "INSERT INTO academic_years(name, status) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "si", $name, $status);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=academic-years");
    exit;
  }
}
?>