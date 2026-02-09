<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);
  $name = htmlspecialchars($_POST["name"]);
  $status = htmlspecialchars($_POST["status"]);

  $encryptId = encryptId($id);

  $error = [];
  if (empty($name)) {
    $error["name"] = "Tahun Ajar harus diisi";
  }

  if (!isset($status)) {
    $error["status"] = "Status Tahun Ajar harus dipilih";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=academic-years-edit&id=$encryptId");
    exit;
  }

  if (empty($error)) {
    $sql = "UPDATE academic_years SET name = ?, status = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "sii", $name, $status, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=academic-years");
    exit;
  }
}
?>