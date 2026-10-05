<!doctype html>
<html lang="id">
<head>
  @include('partials.head')
  <title>@yield('title', config('school.name'))</title>
</head>
<body class="font-sans bg-paper text-slate-800 min-h-screen flex flex-col">
@php
  $nav = [
    'home'           => ['Beranda', 'home'],
    'about'          => ['Tentang', 'about'],
    'articles.index' => ['Artikel', 'articles.*'],
    'gallery.index'  => ['Galeri',  'gallery.*'],
    'products.index' => ['Produk',  'products.*'],
    'contact'        => ['Kontak',  'contact'],
  ];
@endphp

<header class="sticky top-0 z-30 bg-paper/95 backdrop-blur border-b border-slate-200">
 <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
  <a href="{{ route('home') }}" class="font-serif font-bold text-xl text-navy">{{ config('school.name') }}</a>
  <nav class="hidden md:flex gap-6 text-sm font-medium">
   @foreach($nav as $r => [$label, $pat])
    <a href="{{ route($r) }}" class="py-5 border-b-2 {{ request()->routeIs($pat) ? 'border-gold text-gold' : 'border-transparent text-navy hover:text-gold' }}">{{ $label }}</a>
   @endforeach
  </nav>
  <a href="{{ route('login') }}" class="hidden md:block bg-navy text-white text-sm px-4 py-2 rounded">Login Admin</a>
  <button onclick="document.getElementById('m').classList.toggle('hidden')" class="md:hidden text-navy" aria-label="Menu">☰</button>
 </div>
 <div id="m" class="hidden md:hidden border-t bg-paper px-4 py-2 text-sm">
  @foreach($nav as $r => [$label]) <a class="block py-2 text-navy" href="{{ route($r) }}">{{ $label }}</a> @endforeach
  <a class="block py-2 font-semibold text-gold" href="{{ route('login') }}">Login Admin</a>
 </div>
</header>

<main class="flex-1">
  @yield('content')
</main>

{{-- FOOTER --}}
<footer> @include('partials.footer')</footer>

</body>
</html>