@extends('layout')
@section('title', $article->title)
@section('content')
<x-page-header :title="$article->title" :crumbs="['Artikel' => route('articles.index'), $article->category => null]" />
<article class="mx-auto max-w-3xl px-4 py-10">
  <p class="mb-6 text-sm text-slate-500">{{ $article->author ?? 'Redaksi' }} · {{ $article->published_at?->translatedFormat('d F Y') }}</p>
  <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="mb-8 w-full rounded-lg object-cover">
  <div class="space-y-4 text-lg leading-8 text-slate-700">{!! nl2br(e($article->body)) !!}</div>
</article>
@if($related->isNotEmpty())
<section class="mx-auto max-w-7xl px-4"><h2 class="mb-6 font-serif text-2xl font-bold text-navy">Artikel lainnya</h2>
  <div class="grid gap-6 md:grid-cols-3">@foreach($related as $a) @include('partials.article-card') @endforeach</div></section>
@endif
@endsection
