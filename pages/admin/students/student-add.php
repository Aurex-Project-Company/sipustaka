<?php
$error = $_SESSION['error'] ?? null;
?>
<h2 class="text-2xl mb-3">Tambah Siswa</h2>
<div class="bg-white p-6 rounded shadow">
  <form action="index.php?page=students-add-process" method="POST" class="space-y-4">

    <!-- No Anggota -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        NIS
      </label>
      <input
        type="text"
        name="identity_number"
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
        Nama Siswa
      </label>
      <input
        type="text"
        name="name"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['name'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['name'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Jenis Kelamin -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Jenis Kelamin
      </label>
      <div class="flex items-center gap-6">
        <label class="flex items-center gap-2">
          <input
            type="radio"
            name="gender"
            value="L"
            class="text-slate-600 focus:ring-slate-600"
          >
          <span>Laki-laki</span>
        </label>

        <label class="flex items-center gap-2">
          <input
            type="radio"
            name="gender"
            value="p"
            class="text-slate-600 focus:ring-slate-600"
          >
          <span>Perempuan</span>
        </label>
      </div>
      <?php if (isset($error['gender'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['gender'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Alamat -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Alamat
      </label>
      <textarea
        name="address"
        rows="4"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      ></textarea>
      <?php if (isset($error['address'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['address'] ?>
        </p>
      <?php endif; ?>
    </div>

    <!-- Tahun Masuk -->
    <div>
      <label class="block text-sm font-medium text-gray-700 mb-1">
        Tahun Masuk
      </label>
      <input
        type="text"
        name="entry-year"
        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-slate-600"
      >
      <?php if (isset($error['entry-year'])): ?>
        <p class="text-sm text-red-600 mt-1">
          <?= $error['entry-year'] ?>
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