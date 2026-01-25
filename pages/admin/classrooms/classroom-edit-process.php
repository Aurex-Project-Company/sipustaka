<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);
  $name = htmlspecialchars($_POST["name"]);
  $grade = htmlspecialchars($_POST["grade"]);

  $error = [];
  if (empty($name)) {
    $error["name"] = "Nama Kelas harus diisi";
  }

  if (empty($grade)) {
    $error["grade"] = "Tingkat harus diisi";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=classrooms-edit&id=<?= encryptId($id) ?>");
    exit;
  }

  if (empty($error)) {
    $sql = "UPDATE classrooms SET name = ?, grade = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ssi", $name, $grade, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=classrooms");
    exit;
  }
}
?>