@extends('layouts.admin') @section('title','Produk')
@section('content')
@include('partials.admin-head', ['title'=>'Produk','create'=>route('admin.products.create')])
<div class="bg-white border border-slate-200 rounded overflow-x-auto"><table class="w-full text-sm">
 <thead class="bg-mist text-left text-xs uppercase text-slate-500"><tr><th class="p-3">Produk</th><th class="p-3">Kategori</th><th class="p-3">Harga</th><th class="p-3">Stok</th><th class="p-3"></th></tr></thead>
 @forelse($items as $i)<tr class="border-t"><td class="p-3"><div class="flex items-center gap-3"><x-img :src="$i->image_url" class="w-12 h-12 rounded shrink-0"/><div><p class="font-semibold text-navy">{{ $i->name }}</p><p class="text-xs text-slate-500">{{ $i->sku }}</p></div></div></td>
  <td class="p-3">{{ $i->category }}</td><td class="p-3 font-semibold">{{ $i->price_formatted }}</td><td class="p-3 {{ $i->stock<=10?'text-red-600 font-bold':'' }}">{{ $i->stock }} unit</td>
  @include('partials.admin-actions', ['n'=>'products','i'=>$i])</tr>@empty<tr><td class="p-6 text-slate-400" colspan="5">Belum ada produk.</td></tr>@endforelse</table></div>
<div class="mt-4">{{ $items->links() }}</div>
@endsection
