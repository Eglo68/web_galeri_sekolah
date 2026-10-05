<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title') — Admin {{ config('school.name') }}</title>
  <link rel="preconnect" href="https://fonts.googleapis.com"><link href="https://fonts.googleapis.com/css2?family=Newsreader:wght@500;700&family=Source+Sans+3:wght@400;600;700&display=swap" rel="stylesheet">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper font-sans text-slate-800">
@php $menu = [['Dashboard','admin.dashboard','admin.dashboard'],['Artikel','admin.artikel.index','admin.artikel.*'],['Produk','admin.produk.index','admin.produk.*'],['Galeri','admin.galeri.index','admin.galeri.*']]; @endphp
<div class="flex min-h-screen flex-col md:flex-row">
  <aside class="flex shrink-0 flex-col border-b border-line bg-mist p-5 md:min-h-screen md:w-60 md:border-b-0 md:border-r">
    <a href="{{ route('admin.dashboard') }}" class="font-serif text-xl font-bold text-navy">{{ config('school.name') }}<span class="block font-sans text-xs font-normal text-slate-500">Panel admin</span></a>
    <nav class="mt-4 flex gap-1 overflow-x-auto text-sm font-semibold md:mt-8 md:flex-col">
      @foreach($menu as [$l, $r, $p])
        <a href="{{ route($r) }}" class="whitespace-nowrap rounded px-3 py-2 {{ request()->routeIs($p) ? 'bg-sun text-navy' : 'text-navy hover:bg-white' }}">{{ $l }}</a>
      @endforeach
    </nav>
    <div class="mt-4 flex gap-3 text-sm md:mt-auto md:flex-col md:border-t md:border-line md:pt-4">
      <a href="{{ route('home') }}" target="_blank" class="text-slate-600 hover:text-navy">Lihat situs</a>
      <form method="POST" action="{{ route('admin.logout') }}">@csrf<button class="font-semibold text-red-700 hover:underline">Keluar</button></form>
    </div>
  </aside>
  <main class="min-w-0 flex-1 p-6 md:p-10">@yield('content')</main>
</div>
</body>
</html>
