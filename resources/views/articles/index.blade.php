@extends('layout')
@section('title', 'Artikel')
@section('content')
<x-page-header title="Artikel dan berita" desc="Kabar terbaru seputar kegiatan, prestasi, dan pengumuman sekolah." :crumbs="['Artikel' => null]" />
<div class="mx-auto max-w-7xl px-4 py-10">
  <x-filter-bar :categories="$categories" placeholder="Cari artikel..." />
  <div class="grid gap-6 md:grid-cols-3">@forelse($items as $a) @include('partials.article-card') @empty <p class="text-slate-500">Tidak ada artikel yang cocok.</p> @endforelse</div>
  <div class="mt-10">{{ $items->links() }}</div>
</div>
@endsection
