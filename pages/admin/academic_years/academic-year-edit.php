<?php
$id = decryptId($_GET["id"]);

$query = "SELECT * FROM academic_years WHERE id = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$item = mysqli_fetch_assoc($result);

$error = $_SESSION['error'] ?? null;
?>
<h2 class="text-2xl mb-3">Edit Tahun Ajar</h2>
<div class="bg-white p-6 rounded shadow">
  <form action="index.php?page=academic-years-edit-process" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
    
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Tahun Ajar
      </label>
      <input
        type="text"
        name="name"
        value="<?= $item["name"] ?>"
        placeholder="Contoh: 2025-2026"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['name'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['name'] ?>
        </p>
      <?php endif; ?>
    </div>
    
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Status
      </label>
      <select 
        name="status" 
        id="status"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
        <option value="1" <?= $item["status"] === 1 ? 'selected' : '' ?>>Aktif</option>
        <option value="0" <?= $item["status"] === 0 ? 'selected' : '' ?>>Tidak Aktif</option>
      </select>
      <?php if (isset($error['status'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['status'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Button -->
    <div class="flex flex-col sm:flex-row gap-2 pt-4">
      <button
        type="submit"
        class="px-5 py-2 bg-slate-800 text-white rounded-md hover:bg-slate-700 transition"
      >
        Simpan
      </button>

      <a
        href="index.php?page=academic-years"
        class="px-5 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition text-center"
      >
        Kembali
      </a>
    </div>

  </form>
</div>
<?php
unset($_SESSION['error']);
?>