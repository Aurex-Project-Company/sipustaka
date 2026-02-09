<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $identityNumber = htmlspecialchars($_POST["identity_number"]);
  $name = htmlspecialchars($_POST["name"]);
  $phone = htmlspecialchars($_POST["phone"]);
  $teacherSubject = htmlspecialchars($_POST["teacher-subject"]);

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
    header("Location: index.php?page=teachers-add");
    exit;
  }

  if (empty($error)) {
    $memberType = "Guru";
    $date = date("Y-m-d");
    $sql1 = "INSERT INTO members(member_type, registration_date) VALUES (?, ?)";
    $stmt1 = mysqli_prepare($connect, $sql1);
    mysqli_stmt_bind_param($stmt1, "ss", $memberType, $date);
    mysqli_stmt_execute($stmt1);

    $member_id = mysqli_insert_id($connect);

    $sql2 = "INSERT INTO teachers(member_id, identity_number, name, phone, teacher_subject) VALUES (?, ?, ?, ?, ?)";
    $stmt2 = mysqli_prepare($connect, $sql2);
    mysqli_stmt_bind_param($stmt2, "issss", $member_id, $identityNumber, $name, $phone, $teacherSubject);
    mysqli_stmt_execute($stmt2);

    header("Location: index.php?page=teachers");
    exit;
  }
}
?>