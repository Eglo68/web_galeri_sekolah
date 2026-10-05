<!doctype html><html lang="id"><head>@include('partials.head')<title>@yield('title','Admin') — {{ config('school.name') }}</title></head>
<body class="font-sans bg-paper text-slate-800 md:flex min-h-screen">
@php $menu = ['admin.dashboard'=>['Dashboard','admin.dashboard'],'admin.articles.index'=>['Artikel','admin.articles.*'],'admin.products.index'=>['Produk','admin.products.*'],'admin.galleries.index'=>['Galeri','admin.galleries.*']]; @endphp
<aside class="md:w-56 bg-mist border-r border-slate-200 p-4 md:min-h-screen flex md:flex-col gap-1 overflow-x-auto">
 <a href="{{ route('admin.dashboard') }}" class="font-serif font-bold text-xl text-navy md:mb-6 mr-4 md:mr-0 whitespace-nowrap">Admin Portal<span class="block font-sans font-normal text-[11px] text-slate-500">{{ config('school.name') }}</span></a>
 @foreach($menu as $r => [$l, $p])<a href="{{ route($r) }}" class="px-3 py-2 rounded text-sm font-semibold whitespace-nowrap {{ request()->routeIs($p) ? 'bg-[#ffd98a] text-navy' : 'text-navy/80 hover:bg-white' }}">{{ $l }}</a>@endforeach
 <form method="post" action="{{ route('logout') }}" class="md:mt-auto">@csrf<button class="px-3 py-2 text-sm text-slate-600 hover:text-red-600 w-full text-left">Logout</button></form>
 <a href="{{ route('home') }}" target="_blank" class="px-3 py-2 text-xs text-slate-500 hover:text-gold whitespace-nowrap">Lihat situs ↗</a>
</aside>
<main class="flex-1 p-5 md:p-8 min-w-0">
 @if(session('ok'))<p class="bg-green-50 text-green-700 text-sm p-3 rounded mb-4">{{ session('ok') }}</p>@endif
 @yield('content')
</main></body></html>
