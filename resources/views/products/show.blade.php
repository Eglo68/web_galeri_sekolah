@extends('layout')
@section('title', $product->name)
@section('content')
<x-page-header :title="$product->name" :crumbs="['Produk' => route('products.index'), $product->name => null]" />
<div class="mx-auto grid max-w-5xl gap-10 px-4 py-10 md:grid-cols-2">
  <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-full rounded-lg border border-line object-cover">
  <div>
    <span class="text-xs font-bold text-gold">{{ $product->category }}</span>
    <p class="mt-2 font-serif text-3xl font-bold text-navy">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
    <p class="mt-1 text-sm {{ $product->stock > 0 ? 'text-slate-500' : 'font-semibold text-red-600' }}">{{ $product->stock > 0 ? 'Stok tersedia: '.$product->stock : 'Stok habis' }}@if($product->sku) · SKU {{ $product->sku }}@endif</p>
    <p class="mt-6 leading-relaxed text-slate-600">{{ $product->description ?: 'Belum ada deskripsi.' }}</p>
    <a href="{{ route('contact') }}" class="mt-8 inline-block rounded bg-navy px-6 py-3 font-semibold text-white hover:bg-navy-soft">Tanya atau pesan</a>
  </div>
</div>
@if($related->isNotEmpty())
<section class="mx-auto max-w-7xl px-4"><h2 class="mb-6 font-serif text-2xl font-bold text-navy">Produk serupa</h2>
  <div class="grid grid-cols-2 gap-5 md:grid-cols-4">@foreach($related as $p) @include('partials.product-card') @endforeach</div></section>
@endif
@endsection
