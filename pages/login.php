<?php
$error = $_SESSION["error"] ?? "";

?>
<div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    
  <!-- Header -->
  <div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-slate-800">Login</h1>
    <p class="text-sm text-gray-500">Masuk ke dashboard Anda</p>
  </div>
  
  <?php if (isset($error["error"])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
      <strong class="font-bold">Gagal!</strong>
      <span> <?=  $error["error"] ?></span>
  </div>
  <?php endif; ?>
  <!-- Form -->
  <form class="space-y-4" action="auth.php?page=login-process" method="POST">

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium text-gray-600 mb-1">
        Email
      </label>
      <input
        type="email"
        placeholder="email@example.com"
        name="email"
        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-slate-600"
      />
    </div>

    <!-- Password -->
    <div>
      <label class="block text-sm font-medium text-gray-600 mb-1">
        Password
      </label>
      <input
        type="password"
        placeholder="••••••••"
        name="password"
        class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-slate-600"
      />
    </div>

    <!-- Button -->
    <button
      type="submit"
      class="w-full bg-slate-800 text-white py-2 rounded hover:bg-slate-700 transition"
    >
      Login
    </button>

  </form>

  <!-- Footer -->
  <div class="text-center mt-6 text-sm text-gray-500">
    © 2026 SiPustaka
  </div>

</div>
<?php
unset($_SESSION["error"]);
?>