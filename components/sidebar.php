<aside class="fixed top-14 left-0 w-64 h-[calc(100vh-3.5rem)] bg-slate-800 text-white flex flex-col">

  <!-- Profile Dropdown -->
  <div class="p-4 border-b border-slate-700">
    <button onclick="toggleProfile()" class="w-full flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="w-9 h-9 rounded-full bg-slate-600 flex items-center justify-center font-bold">
          👤
        </div>

        <div class="flex flex-col leading-tight text-left">
          <span class="font-semibold"><?= $_SESSION["name"] ?></span>
          <span class="text-xs text-slate-300">Administrator</span>
        </div>
      </div>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <div id="profileDropdown" class="hidden mt-3 space-y-2">
      <a href="#" class="block text-sm hover:text-slate-300">Profile</a>
      <a href="auth.php?page=logout" class="block text-sm text-red-400 hover:text-red-300">Logout</a>
    </div>
  </div>

  <!-- Menu -->
  <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

    <a href="index.php?page=dashboard" class="block px-3 py-2 rounded hover:bg-slate-700 <?= active(['dashboard'], $page) ?>">
      Dashboard
    </a>

    <!-- Dropdown Menu -->
    <div>
      <button onclick="toggleMenuBook()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700 <?= $isBookActive ? 'bg-slate-700 font-semibold' : '' ?>">
        <span>Master Data Buku</span>
        <svg class="w-4 h-4 transition-transform <?= $isBookActive ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownBook" class="<?= $isBookActive ? '' : 'hidden' ?> ml-4 mt-2 space-y-1">
        <a href="index.php?page=categories" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active(['categories', 'categories-add', 'categories-edit'], $page) ?>">
          Kategori Buku
        </a>
        <a href="index.php?page=books" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active('books', $page) ?>">
          Buku
        </a>
      </div>
    </div>

    <div>
      <button onclick="toggleMenuMember()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700 <?= $isMemberActive ? 'bg-slate-700 font-semibold' : '' ?>">
        <span>Master Data Anggota</span>
        <svg class="w-4 h-4 transition-transform <?= $isMemberActive ? 'rotate-180' : '' ?>" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownMember" class="<?= $isMemberActive ? '' : 'hidden' ?> ml-4 mt-2 space-y-1">
        <a href="index.php?page=classrooms" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active(['classrooms', 'classrooms-add', 'classrooms-edit'], $page) ?>">
          Kelas
        </a>
        <a href="index.php?page=academic-years" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active(['academic-years', 'academic-years-add', 'academic-years-edit'], $page) ?>">
          Tahun Ajar
        </a>
        <a href="index.php?page=students" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active(['students', 'students-add', 'students-edit'], $page) ?>">
          Siswa
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Riwayat Kelas
        </a>
        <a href="index.php?page=teachers" class="block px-3 py-1 text-sm rounded hover:bg-slate-700 <?= active(['teachers', 'teachers-add', 'teachers-edit'], $page) ?>">
          Guru
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Anggota
        </a>
      </div>
    </div>

    <div>
      <button onclick="toggleMenuBorrow()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700">
        <span>Peminjaman</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownBorrow" class="hidden ml-4 mt-2 space-y-1">
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Peminjaman Buku
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Pengembalian Buku
        </a>
      </div>
    </div>

    <div>
      <button onclick="toggleMenuReport()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700">
        <span>Laporan</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownReport" class="hidden ml-4 mt-2 space-y-1">
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Laporan Peminjaman Buku
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Laporan Kunjungan
        </a>
      </div>
    </div>

  </nav>
</aside>