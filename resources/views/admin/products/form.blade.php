@extends('layouts.admin') @section('title','Produk')
@section('content')
@component('partials.admin-form', ['n'=>'products','item'=>$item,'label'=>'Produk'])
 <label class="block text-sm font-semibold text-navy">Nama produk<input name="name" value="{{ old('name',$item->name) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label>
 <div class="grid sm:grid-cols-2 gap-4">
  <label class="text-sm font-semibold text-navy">Kategori<select name="category" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal">@foreach(\App\Models\Product::CATEGORIES as $c)<option @selected(old('category',$item->category)===$c)>{{ $c }}</option>@endforeach</select></label>
  <label class="text-sm font-semibold text-navy">SKU<input name="sku" value="{{ old('sku',$item->sku) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label>
  <label class="text-sm font-semibold text-navy">Harga (Rp)<input type="number" min="0" name="price" value="{{ old('price',$item->price) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label>
  <label class="text-sm font-semibold text-navy">Stok<input type="number" min="0" name="stock" value="{{ old('stock',$item->stock ?? 0) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label></div>
 <label class="block text-sm font-semibold text-navy">Deskripsi<textarea name="description" rows="5" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal">{{ old('description',$item->description) }}</textarea></label>
@endcomponent
@endsection
