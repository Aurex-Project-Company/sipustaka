<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    header("Location: index.php?page=classrooms-add");
    exit;
  }

  if (empty($error)) {
    $sql = "INSERT INTO classrooms(name, grade) VALUES (?, ?)";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $name, $grade);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=classrooms");
    exit;
  }
}
?>