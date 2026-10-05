@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
<h1 class="font-serif text-3xl font-bold text-navy">Dashboard</h1>
<div class="mt-6 grid grid-cols-2 gap-4 lg:grid-cols-5">
  @foreach($stats as $label => $n)
    <div class="rounded-lg border border-line bg-white p-5"><p class="text-xs text-slate-500">{{ $label }}</p><p class="mt-1 font-serif text-3xl font-bold text-navy">{{ $n }}</p></div>
  @endforeach
</div>
<div class="mt-8 grid gap-6 lg:grid-cols-2">
  <section class="rounded-lg border border-line bg-white p-5">
    <div class="mb-3 flex items-center justify-between"><h2 class="font-serif text-xl font-bold text-navy">Artikel terbaru</h2><a href="{{ route('admin.artikel.create') }}" class="text-sm font-semibold text-gold">+ Tulis artikel</a></div>
    @forelse($articles as $a)<div class="flex justify-between border-t border-line py-2 text-sm"><span>{{ $a->title }}</span><span class="text-xs text-slate-500">{{ $a->status === 'published' ? 'Terbit' : 'Draf' }}</span></div>@empty<p class="text-sm text-slate-500">Belum ada artikel.</p>@endforelse
  </section>
  <section class="rounded-lg border border-line bg-white p-5">
    <h2 class="mb-3 font-serif text-xl font-bold text-navy">Pesan masuk</h2>
    @forelse($messages as $m)<div class="border-t border-line py-2 text-sm"><p class="font-semibold text-navy">{{ $m->name }} <span class="font-normal text-slate-500">· {{ $m->subject }} · {{ $m->created_at->diffForHumans() }}</span></p><p class="line-clamp-2 text-slate-600">{{ $m->body }}</p></div>@empty<p class="text-sm text-slate-500">Belum ada pesan.</p>@endforelse
  </section>
</div>
@endsection
