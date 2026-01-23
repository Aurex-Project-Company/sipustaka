<aside class="fixed top-14 left-0 w-64 h-[calc(100vh-3.5rem)] bg-slate-800 text-white flex flex-col">

  <!-- Profile Dropdown -->
  <div class="p-4 border-b border-slate-700">
    <button onclick="toggleProfile()" class="w-full flex items-center justify-between">
      <div>
        <p class="font-semibold">Rakhmat</p>
        <p class="text-xs text-slate-300">Administrator</p>
      </div>
      <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M19 9l-7 7-7-7" />
      </svg>
    </button>

    <div id="profileDropdown" class="hidden mt-3 space-y-2">
      <a href="#" class="block text-sm hover:text-slate-300">Profile</a>
      <a href="#" class="block text-sm text-red-400 hover:text-red-300">Logout</a>
    </div>
  </div>

  <!-- Menu -->
  <nav class="flex-1 p-4 space-y-2 overflow-y-auto">

    <a href="index.php?page=dashboard" class="block px-3 py-2 rounded hover:bg-slate-700">
      Dashboard
    </a>

    <!-- Dropdown Menu -->
    <div>
      <button onclick="toggleMenuBook()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700">
        <span>Master Data Buku</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownBook" class="hidden ml-4 mt-2 space-y-1">
        <a href="index.php?page=categories" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Kategori Buku
        </a>
        <a href="index.php?page=books" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Buku
        </a>
      </div>
    </div>

    <div>
      <button onclick="toggleMenuMember()" class="w-full flex items-center justify-between px-3 py-2 rounded hover:bg-slate-700">
        <span>Master Data Anggota</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M19 9l-7 7-7-7" />
        </svg>
      </button>

      <div id="menuDropdownMember" class="hidden ml-4 mt-2 space-y-1">
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Kelas
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Tahun Ajar
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Siswa
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
          Riwayat Kelas
        </a>
        <a href="#" class="block px-3 py-1 text-sm rounded hover:bg-slate-700">
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

    <a href="#" class="block px-3 py-2 rounded hover:bg-slate-700">
      Settings
    </a>

  </nav>
</aside>