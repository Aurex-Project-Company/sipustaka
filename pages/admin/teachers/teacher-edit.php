<?php
$id = decryptId($_GET["id"]);

$query = "SELECT * FROM teachers WHERE id = ?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$item = mysqli_fetch_assoc($result);

$error = $_SESSION['error'] ?? null;
?>
<h2 class="text-2xl mb-3">Edit Guru</h2>
<div class="bg-white p-6 rounded shadow">
  <form action="index.php?page=teachers-edit-process" method="POST" class="space-y-4">
    <input type="hidden" name="id" value="<?= $_GET['id'] ?>">

    <!-- No Anggota -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Nomor Anggota
      </label>
      <input
        type="text"
        name="identity_number"
        value="<?= $item['identity_number'] ?>"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['identity_number'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['identity_number'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Nama Guru -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Nama Guru
      </label>
      <input
        type="text"
        name="name"
        value="<?= $item['name'] ?>"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['name'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['name'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- No Telepon Guru -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        No Telepon
      </label>
      <input
        type="text"
        name="phone"
        placeholder="6288856762626"
        value="<?= $item['phone'] ?>"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['phone'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['phone'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- No Telepon Guru -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Mata Pelajaran
      </label>
      <input
        type="text"
        name="teacher-subject"
        value="<?= $item['teacher_subject'] ?>"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['teacher-subject'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['teacher-subject'] ?>
        </p>
      <?php endif; ?>
    </div>

    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Status
      </label>
      <select 
        name="is_active" 
        id="is_active"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
        <option value="1" <?= $item["is_active"] === 1 ? 'selected' : '' ?>>Aktif</option>
        <option value="0" <?= $item["is_active"] === 0 ? 'selected' : '' ?>>Tidak Aktif</option>
      </select>
      <?php if (isset($error['is_active'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['is_active'] ?>
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
        href="index.php?page=classrooms"
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