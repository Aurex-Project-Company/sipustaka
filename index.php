<?php
ob_start();
session_start();
if (!isset($_SESSION["name"])) {
  header("Location: auth.php?page=login");
  exit();
}

require_once "config/database.php";
require_once "routes/web.php";
require_once "library/library.php";

$page = $_GET['page'] ?? 'dashboard';
$page_file = $pages[$page] ?? $pages['dashboard'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>SiPustaka</title>
  <link rel="stylesheet" href="assets/css/output.css">
</head>
<body class="bg-gray-100">

  <!-- Topbar -->
  <?php include "components/topbar.php" ?>
  <!-- End Topbar -->

  <!-- Sidebar -->
  <?php include "components/sidebar.php" ?>
  <!-- End Sidebar -->

  <!-- Content -->
  <main class="ml-64 pt-16 pb-14 px-6 min-h-screen">
    <?php include $page_file; ?>
  </main>

  <!-- Footer -->
  <?php include "components/footer.php" ?>
  <!-- End Footer -->

  <!-- Script Dropdown -->
  <script src="assets/js/script.js"></script>
</body>
</html>
<?php ob_end_flush(); ?>