@extends('layout')
@section('title', $gallery->title)
@section('content')
<x-page-header :title="$gallery->title" :crumbs="['Galeri' => route('gallery.index'), $gallery->title => null]" />
<div class="mx-auto max-w-4xl px-4 py-10">
  <img src="{{ $gallery->image_url }}" alt="{{ $gallery->title }}" class="w-full rounded-lg">
  <p class="mt-4 text-sm text-slate-500"><span class="font-bold text-gold">{{ $gallery->category }}</span>@if($gallery->taken_at) · {{ $gallery->taken_at->translatedFormat('d F Y') }}@endif</p>
  @if($gallery->description)<p class="mt-3 text-lg leading-8 text-slate-700">{{ $gallery->description }}</p>@endif
</div>
@if($related->isNotEmpty())
<section class="mx-auto max-w-7xl px-4"><h2 class="mb-6 font-serif text-2xl font-bold text-navy">Foto lainnya</h2>
  <div class="grid grid-cols-2 gap-4 md:grid-cols-4">@foreach($related as $g) @include('partials.gallery-card') @endforeach</div></section>
@endif
@endsection
