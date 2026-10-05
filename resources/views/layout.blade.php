<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', config('school.name')) — {{ config('school.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@500;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper font-sans text-slate-800 antialiased">
@php
  $menu = ['home' => 'Beranda', 'about' => 'Tentang', 'articles.index' => 'Artikel', 'gallery.index' => 'Galeri', 'products.index' => 'Produk', 'contact' => 'Kontak'];
  $pattern = ['home' => 'home', 'about' => 'about', 'articles.index' => 'articles.*', 'gallery.index' => 'gallery.*', 'products.index' => 'products.*', 'contact' => 'contact'];
@endphp
<header class="sticky top-0 z-40 border-b border-line bg-paper/95 backdrop-blur">
  <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3">
    <a href="{{ route('home') }}" class="font-serif text-xl font-bold text-navy">{{ config('school.name') }}</a>
    <nav class="hidden items-center gap-6 text-sm font-semibold md:flex">
      @foreach($menu as $r => $label)
        <a href="{{ route($r) }}" class="border-b-2 py-1 {{ request()->routeIs($pattern[$r]) ? 'border-gold text-gold' : 'border-transparent text-navy hover:text-gold' }}">{{ $label }}</a>
      @endforeach
      <a href="{{ route('admin.login') }}" class="rounded bg-navy px-4 py-2 text-white hover:bg-navy-soft">Login Admin</a>
    </nav>
    <button class="rounded border border-line px-3 py-1.5 text-sm font-semibold text-navy md:hidden" aria-label="Menu" onclick="document.getElementById('m').classList.toggle('hidden')">Menu</button>
  </div>
  <nav id="m" class="hidden flex-col border-t border-line px-4 py-2 text-sm font-semibold md:hidden">
    @foreach($menu as $r => $label)<a href="{{ route($r) }}" class="block py-2 text-navy">{{ $label }}</a>@endforeach
    <a href="{{ route('admin.login') }}" class="block py-2 text-gold">Login Admin</a>
  </nav>
</header>

<main>@yield('content')</main>

<footer>@include('partials.footer')</footer>
</body>
</html>
