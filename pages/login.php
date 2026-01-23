<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

  <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
    
    <!-- Header -->
    <div class="text-center mb-6">
      <h1 class="text-2xl font-bold text-slate-800">Login</h1>
      <p class="text-sm text-gray-500">Masuk ke dashboard Anda</p>
    </div>

    <!-- Form -->
    <form class="space-y-4">

      <!-- Email -->
      <div>
        <label class="block text-sm font-medium text-gray-600 mb-1">
          Email
        </label>
        <input
          type="email"
          placeholder="email@example.com"
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

</body>
</html>
