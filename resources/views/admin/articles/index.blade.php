@extends('layouts.admin') @section('title','Artikel')
@section('content')
@include('partials.admin-head', ['title'=>'Artikel','create'=>route('admin.articles.create')])
<div class="bg-white border border-slate-200 rounded overflow-x-auto"><table class="w-full text-sm">
 <thead class="bg-mist text-left text-xs uppercase text-slate-500"><tr><th class="p-3">Judul</th><th class="p-3">Kategori</th><th class="p-3">Status</th><th class="p-3">Terbit</th><th class="p-3"></th></tr></thead>
 @forelse($items as $i)<tr class="border-t"><td class="p-3"><div class="flex items-center gap-3"><x-img :src="$i->image_url" class="w-12 h-12 rounded shrink-0"/><div><p class="font-semibold text-navy">{{ $i->title }}</p><p class="text-xs text-slate-500">{{ $i->author }}</p></div></div></td>
  <td class="p-3">{{ $i->category }}</td><td class="p-3 {{ $i->status==='published'?'text-green-600':'text-slate-400' }}">{{ $i->status==='published'?'Terbit':'Draf' }}</td><td class="p-3 text-xs">{{ $i->published_at?->translatedFormat('d M Y') ?? '—' }}</td>
  @include('partials.admin-actions', ['n'=>'articles','i'=>$i])</tr>@empty<tr><td class="p-6 text-slate-400" colspan="5">Belum ada artikel.</td></tr>@endforelse</table></div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
