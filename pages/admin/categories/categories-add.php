<?php
$error = $_SESSION['error'] ?? null;
?>
<h2 class="text-2xl mb-3">Tambah Kategori</h2>
<div class="bg-white p-6 rounded shadow">
  <form action="index.php?page=categories-add-process" method="POST" class="space-y-4">

    <!-- Nama Kategori -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Nama Kategori
      </label>
      <input
        type="text"
        name="name"
        placeholder="Contoh: Fiksi"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['name'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['name'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Keterangan (Optional) -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Keterangan
      </label>
      <textarea
        name="description"
        rows="3"
        placeholder="Opsional"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      ></textarea>
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
        href="index.php?page=categories"
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