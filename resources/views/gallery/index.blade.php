@extends('layout')
@section('title', 'Galeri')
@section('content')
<x-page-header title="Galeri foto" desc="Suasana kampus, fasilitas, dan momen penting SMKN 4 Bogor." :crumbs="['Galeri' => null]" />
<div class="mx-auto max-w-7xl px-4 py-10">
  <x-filter-bar :categories="$categories" placeholder="Cari foto..." />
  <div class="grid grid-cols-2 gap-4 md:grid-cols-4">@forelse($items as $g) @include('partials.gallery-card') @empty <p class="text-slate-500">Tidak ada foto yang cocok.</p> @endforelse</div>
  <div class="mt-10">{{ $items->links() }}</div>
</div>
@endsection
