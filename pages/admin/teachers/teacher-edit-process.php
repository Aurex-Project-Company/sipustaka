<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $id = (int)decryptId($_POST["id"]);
  $identityNumber = htmlspecialchars($_POST["identity_number"]);
  $name = htmlspecialchars($_POST["name"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $teacherSubject = htmlspecialchars($_POST["teacher-subject"]);
  $isActive = htmlspecialchars($_POST["is_active"]);

  $encryptId = encryptId($id);

  $error = [];
  if (empty($identityNumber)) {
    $error["identity_number"] = "Nomor Anggota harus diisi";
  } elseif (strlen($identityNumber) < 8) {
    $error["identity_number"] = "Nomor Anggota kurang dari 8 digit";
  }

  if (empty($name)) {
    $error["name"] = "Nama Guru harus diisi";
  }

  if (empty($phone)) {
    $error["phone"] = "No Telepon harus diisi";
  } elseif (strlen($phone) < 10) {
    $error["phone"] = "No Telepon kurang dari 10 digit";
  }

  if (empty($teacherSubject)) {
    $error["teacher-subject"] = "Mata Pelajaran harus diisi";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=teachers-edit&id=$encryptId");
    exit;
  }

  if (empty($error)) {
    $sql = "UPDATE teachers SET identity_number = ?, name = ?, phone = ?, teacher_subject = ? WHERE id = ?";
    $stmt = mysqli_prepare($connect, $sql);
    mysqli_stmt_bind_param($stmt, "ssssi", $identityNumber, $name, $phone, $teacherSubject, $id);
    mysqli_stmt_execute($stmt);

    header("Location: index.php?page=teachers");
    exit;
  }
}
?>