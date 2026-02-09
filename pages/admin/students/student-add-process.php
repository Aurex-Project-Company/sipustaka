<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $identityNumber = htmlspecialchars($_POST["identity_number"]);
  $name = htmlspecialchars($_POST["name"]);
  $gender = htmlspecialchars($_POST["gender"]);
  $address = htmlspecialchars($_POST["address"]);
  $entryYear = htmlspecialchars($_POST["entry-year"]);

  $error = [];
  if (empty($identityNumber)) {
    $error["identity_number"] = "Nomor Anggota harus diisi";
  } elseif (strlen($identityNumber) < 8) {
    $error["identity_number"] = "Nomor Anggota kurang dari 8 digit";
  }

  if (empty($name)) {
    $error["name"] = "Nama Siswa harus diisi";
  }

  if (empty($gender)) {
    $error["gender"] = "Jenis Kelamin harus dipilih";
  }

  if (empty($address)) {
    $error["address"] = "Alamat harus diisi";
  }

  if (empty($entryYear)) {
    $error["entry-year"] = "Tahun Masuk harus diisi";
  } elseif (strlen($entryYear) < 4 || strlen($entryYear) > 5) {
    $error["entry-year"] = "Tahun Masuk harus 4 digit";
  }

  if (count($error) > 0) {
    $_SESSION["error"] = $error;
    header("Location: index.php?page=students-add");
    exit;
  }

  if (empty($error)) {
    $memberType = "Siswa";
    $date = date("Y-m-d");
    $sql1 = "INSERT INTO members(member_type, registration_date) VALUES (?, ?)";
    $stmt1 = mysqli_prepare($connect, $sql1);
    mysqli_stmt_bind_param($stmt1, "ss", $memberType, $date);
    mysqli_stmt_execute($stmt1);

    $member_id = mysqli_insert_id($connect);

    $sql2 = "INSERT INTO students(member_id, identity_number, name, gender, address, entry_year) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt2 = mysqli_prepare($connect, $sql2);
    mysqli_stmt_bind_param($stmt2, "isssss", $member_id, $identityNumber, $name, $gender, $address, $entryYear);
    mysqli_stmt_execute($stmt2);

    header("Location: index.php?page=students");
    exit;
  }
}
?>