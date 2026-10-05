@extends('layout')
@section('title', 'Produk')
@section('content')
<x-page-header title="Produk sekolah" desc="Seragam, buku, dan merchandise resmi SMKN 4 Bogor." :crumbs="['Produk' => null]" />
<div class="mx-auto max-w-7xl px-4 py-10">
  <x-filter-bar :categories="$categories" placeholder="Cari produk..." />
  <div class="grid grid-cols-2 gap-5 md:grid-cols-4">@forelse($items as $p) @include('partials.product-card') @empty <p class="text-slate-500">Tidak ada produk yang cocok.</p> @endforelse</div>
  <div class="mt-10">{{ $items->links() }}</div>
</div>
@endsection
