@extends('layouts.app')
@section('content')

{{-- BACKGROUND --}}
<section class="relative bg-navy bg-cover bg-center text-white" style="background-image: linear-gradient(rgba(0,26,61,.75), rgba(0,26,61,.75)), url('{{ asset('images/lapangan.JPG') }}')">
 <div class="max-w-6xl mx-auto px-4 py-20 md:py-28">
  <span class="bg-gold/90 text-navy text-[11px] font-bold px-3 py-1 rounded">SEJAK 2009</span>
  <h1 class="font-serif font-bold text-4xl md:text-5xl mt-5 leading-tight max-w-2xl">{{ Str::upper(config('school.full_name')) }}</h1>
  <p class="text-slate-200 mt-4 max-w-xl">Mewujudkan siswa berprestasi, berintegritas, dan berwawasan global melalui kurikulum berbasis nilai kebudayaan bangsa.</p>
<div class="mt-8 flex gap-3"><a href="{{ route('gallery.index') }}" class="bg-gold text-navy font-semibold px-5 py-2.5 rounded">Lihat Fasilitas</a> </div>
</section>

{{-- KEPALA SEKOLAH --}}
<section class="mx-auto grid max-w-7xl items-center gap-12 px-4 py-20 md:grid-cols-2">
  <div>
    <p class="text-sm font-bold text-gold">Kepala sekolah</p>
    <h2 class="mt-1 font-serif text-3xl font-bold text-navy">{{ config('school.head') }}</h2>
    <p class="mt-4 max-w-prose leading-relaxed text-slate-600">Selamat datang di {{ config('school.name') }}, tempat terbaik untuk mengembangkan potensi dan meraih masa depan. Kami berkomitmen menyajikan pendidikan vokasi dan akademik berkualitas tinggi yang tidak hanya mengasah keahlian teknis, tetapi juga membentuk karakter berintegritas yang berakar kuat pada nilai-nilai luhur budaya bangsa.</p>
    <blockquote class="mt-6 border-l-4 border-gold pl-4 font-serif text-xl font-bold text-navy">“Fokus perbaiki diri, bukan bandingkan diri.”</blockquote>
  </div>
  <img src="{{ asset('images/kepsek.jpg') }}" alt="Kepala Sekolah" class="aspect-[15/8] w-full rounded-lg bg-mist object-cover object-[center_35%] shadow-xl">
</section>

{{-- ARTIKEL --}}
<section class="bg-mist py-16">
  <div class="mx-auto max-w-7xl px-4">
    <div class="mb-8 flex items-end justify-between gap-4">
      <div>
        <p class="text-sm font-semibold text-slate-500">Informasi terkini</p>
        <h2 class="font-serif text-3xl font-bold text-navy">Berita &amp; artikel sekolah</h2>
      </div>
      <a href="{{ route('articles.index') }}" class="shrink-0 rounded-full border border-navy px-5 py-2 text-sm font-semibold text-navy hover:bg-navy hover:text-white">Lihat semua →</a>
    </div>
    <div class="grid gap-6 md:grid-cols-3">
      @forelse($articles as $a) @include('partials.article-card')
      @empty <p class="text-slate-500">Belum ada artikel terbit.</p>
      @endforelse
    </div>
  </div>
</section>

{{-- GALERI --}}
<section class="py-16">
  <div class="mx-auto max-w-7xl px-4">
    <div class="mb-8 flex items-end justify-between gap-4">
      <div>
        <p class="text-sm font-semibold text-slate-500">Dokumentasi</p>
        <h2 class="font-serif text-3xl font-bold text-navy">Galeri sekolah</h2>
      </div>
      <a href="{{ route('gallery.index') }}" class="shrink-0 rounded-full border border-navy px-5 py-2 text-sm font-semibold text-navy hover:bg-navy hover:text-white">Lihat semua →</a>
    </div>
    <div class="grid grid-cols-2 gap-4 md:grid-cols-3">
      @forelse($galleries as $g) @include('partials.gallery-card')
      @empty <p class="col-span-full text-slate-500">Belum ada foto.</p>
      @endforelse
    </div>
  </div>
</section>

{{-- PRODUK --}}
<section class="bg-mist py-16">
  <div class="mx-auto max-w-7xl px-4">
    <div class="mb-8 flex items-end justify-between gap-4">
      <div>
        <p class="text-sm font-semibold text-slate-500">Koperasi sekolah</p>
        <h2 class="font-serif text-3xl font-bold text-navy">Produk sekolah</h2>
      </div>
      <a href="{{ route('products.index') }}" class="shrink-0 rounded-full border border-navy px-5 py-2 text-sm font-semibold text-navy hover:bg-navy hover:text-white">Lihat semua →</a>
    </div>
    <div class="grid grid-cols-2 gap-5 md:grid-cols-4">
      @forelse($products as $p) @include('partials.product-card')
      @empty <p class="col-span-full text-slate-500">Belum ada produk.</p>
      @endforelse
    </div>
  </div>
</section>
@endsection