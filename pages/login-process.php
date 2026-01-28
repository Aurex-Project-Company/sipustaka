<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);

  $error = [];

  if (empty($email) || empty($password)) {
    $error["error"] = "Email dan Password salah!";
    $_SESSION["error"] = $error;
    header("Location: auth.php?page=login");
    exit();
  }

  $sql = "SELECT email, name, password, status FROM users WHERE email = ? LIMIT 1";
  $stmt = mysqli_prepare($connect, $sql);
  mysqli_stmt_bind_param($stmt, "s", $email);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);

    if (password_verify($password, $data["password"])) {
      $_SESSION["name"] = $data["name"];
      $_SESSION["email"] = $data["email"];

      header("Location: index.php?page=dashboard");
    } else {
      $error["error"] = "Password salah!";
      $_SESSION["error"] = $error;
      header("Location: auth.php?page=login");
      exit();
    }
  } else {
    $error["error"] = "Email tidak ditemukan!";
    $_SESSION["error"] = $error;
    header("Location: auth.php?page=login");
    exit(); 
  }
}
?>