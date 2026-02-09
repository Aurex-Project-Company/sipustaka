<?php
// Limit halaman
$limit = 10;
$current = max(1, (int)($_GET['p'] ?? 1));
$offset = ($current - 1) * $limit;

$search = $_GET['q'] ?? '';
$search_like = "%$search%";

$sql = "SELECT * FROM teachers WHERE name LIKE ? LIMIT ?, ?";
$stmt = mysqli_prepare($connect, $sql);
mysqli_stmt_bind_param($stmt, "sii", $search_like, $offset, $limit);
mysqli_stmt_execute($stmt);
$results = mysqli_stmt_get_result($stmt);

// Count Data
$count_sql = "SELECT COUNT(*) as total FROM teachers WHERE name LIKE ?";
$count_stmt = mysqli_prepare($connect, $count_sql);
mysqli_stmt_bind_param($count_stmt, "s", $search_like);
mysqli_stmt_execute($count_stmt);
$count_result = mysqli_stmt_get_result($count_stmt);
$total = mysqli_fetch_assoc($count_result)['total'];

$total_page = ceil($total / $limit);


$no = 1;
?>
<h2 class="text-2xl mb-3">Guru</h2>
<div class="bg-white p-6 rounded shadow">

  <div class="flex flex-wrap items-center justify-between gap-2 mb-4"">
    <a href="index.php?page=teachers-add" class="px-4 py-2 bg-slate-800 text-white rounded-md hover:bg-slate-700 focus:ring-2 focus:ring-slate-500 transition">
      Tambah
    </a>

    <form method="GET" class="mb-4">
      <input type="hidden" name="page" value="teachers">

      <input type="text" name="q"
        value="<?= htmlspecialchars($_GET['q'] ?? '') ?>"
        placeholder="Cari nama guru..."
        class="border px-3 py-2 rounded">

      <button class="px-4 py-2 bg-slate-800 text-white rounded-md hover:bg-slate-700 focus:ring-2 focus:ring-slate-500 transition">
        Cari
      </button>
    </form>
  </div>

  <div class="hidden md:block overflow-x-auto">
    <table class="min-w-full text-sm text-left">
      <thead class="bg-slate-800 text-white">
        <tr>
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Nama Guru</th>
          <th class="px-4 py-3">No Telepon</th>
          <th class="px-4 py-3">Mata Pelajaran</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        <?php if (mysqli_num_rows($results) > 0): ?>
          <?php while($item = mysqli_fetch_assoc($results)): ?>
          <tr class="hover:bg-gray-50">
            <td class="px-4 py-3"><?=  $no++ ?></td>
            <td class="px-4 py-3 font-medium"><?= $item["name"] ?></td>
            <td class="px-4 py-3 font-medium"><?= $item["phone"] ?> </td>
            <td class="px-4 py-3 font-medium"><?= $item["teacher_subject"] ?> </td>
            <td class="px-4 py-3 text-center space-x-2">
              <div class="flex justify-center items-center gap-2">
                <a href="index.php?page=classrooms-edit&id=<?= encryptId($item['id']) ?>" class="px-3 py-1 text-xs bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                  Edit
                </a>
                <form action="index.php?page=classrooms-delete" method="POST">
                  <input type="hidden" name="id" value="<?=  encryptId($item['id']) ?>">
                  <button type="submit" class="px-3 py-1 text-xs bg-red-100 text-red-700 rounded hover:bg-red-200 cursor-pointer">
                    Hapus
                  </button>
                </form>
              </div>
            </td>
          </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <p class="text-gray-500">Data Tidak Ditemukan</p>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <?php if (!($total <= $limit)): ?>
  <nav class="flex justify-end items-center space-x-1 mt-5">
    <?php if ($current > 1): ?>
      <a href="index.php?page=categories&p=<?= $p - 1 ?>"
          class="px-3 py-1 border rounded-md hover:bg-gray-100">
          Prev
      </a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $total_page; $i++): ?>
      <a href="index.php?page=categories&p=<?=  $i ?>"
        class="px-3 py-1 border rounded-md <?= $i == $current ? 'bg-slate-800 text-white' : 'bg-white text-gray-700 hover:bg-gray-100' ?>">
        <?= $i ?>
      </a>
    <?php endfor; ?>
    <?php if ($current < $total_page): ?>
      <a href="index.php?page=categories&p=<?= $p + 1 ?>"
          class="px-3 py-1 border rounded-md hover:bg-gray-100">
          Next
      </a>
    <?php endif; ?>
  </nav>
  <?php endif; ?>
</div>