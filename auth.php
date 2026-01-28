<?php
ob_start();
session_start();
require_once "config/database.php";
require_once "routes/web.php";

$page = $_GET['page'] ?? 'login';
$page_file = $pages[$page] ?? $pages['login'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <?php include $page_file; ?>

</body>
</html>
