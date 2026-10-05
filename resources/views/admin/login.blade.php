<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Admin — {{ config('school.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@500;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-paper p-4 font-sans text-slate-800">
  <div class="grid w-full max-w-4xl overflow-hidden rounded-xl border border-line bg-white shadow-xl md:grid-cols-2">
    <div class="flex flex-col items-center justify-center bg-navy p-10 text-center text-white">
      <img src="{{ asset('images/logo.png') }}" alt="" class="mb-5 h-24 w-24 rounded-full bg-white/90 object-contain p-2" onerror="this.remove()">
      <h1 class="font-serif text-3xl font-bold">{{ config('school.name') }}</h1>
      <p class="mt-3 max-w-xs text-sm text-slate-300">Panel pengelola artikel, produk, dan galeri sekolah.</p>
    </div>
    <div class="p-8 md:p-10">
      <h2 class="font-serif text-2xl font-bold text-navy">Selamat datang</h2>
      <p class="mb-6 text-sm text-slate-500">Masuk untuk mengelola konten situs.</p>
      <form method="POST" action="{{ route('admin.login') }}" class="space-y-4">
        @csrf
        <label class="block text-sm font-semibold text-navy">Email
          <input type="email" name="email" value="{{ old('email') }}" required autofocus class="mt-1 w-full rounded border border-line px-3 py-2"></label>
        <label class="block text-sm font-semibold text-navy">Kata sandi
          <input type="password" name="password" required class="mt-1 w-full rounded border border-line px-3 py-2"></label>
        @error('email')<p class="text-sm text-red-600">{{ $message }}</p>@enderror
        <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember"> Ingat saya</label>
        <button class="w-full rounded bg-navy py-3 font-semibold text-white hover:bg-navy-soft">Masuk</button>
      </form>
      <p class="mt-6 border-t border-line pt-4 text-center text-sm text-slate-500">Kendala saat masuk? <a href="{{ route('contact') }}" class="font-semibold text-navy">Hubungi tata usaha</a></p>
    </div>
  </div>
</body>
</html>
