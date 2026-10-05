@extends('layouts.admin') @section('title','Artikel')
@section('content')
@component('partials.admin-form', ['n'=>'articles','item'=>$item,'label'=>'Artikel'])
 <label class="block text-sm font-semibold text-navy">Judul<input name="title" value="{{ old('title',$item->title) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label>
 <div class="grid sm:grid-cols-3 gap-4">
  <label class="text-sm font-semibold text-navy">Kategori<select name="category" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal">@foreach(\App\Models\Article::CATEGORIES as $c)<option @selected(old('category',$item->category)===$c)>{{ $c }}</option>@endforeach</select></label>
  <label class="text-sm font-semibold text-navy">Status<select name="status" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"><option value="draft" @selected(old('status',$item->status)==='draft')>Draf</option><option value="published" @selected(old('status',$item->status)==='published')>Terbit</option></select></label>
  <label class="text-sm font-semibold text-navy">Penulis<input name="author" value="{{ old('author',$item->author ?? 'Admin') }}" ...></label></div>
 <label class="block text-sm font-semibold text-navy">Tanggal terbit (kosong = sekarang)<input type="datetime-local" name="published_at" value="{{ old('published_at',$item->published_at?->format('Y-m-d\TH:i')) }}" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal"></label>
 <label class="block text-sm font-semibold text-navy">Ringkasan<textarea name="excerpt" rows="2" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal">{{ old('excerpt',$item->excerpt) }}</textarea></label>
 <label class="block text-sm font-semibold text-navy">Isi artikel<textarea name="body" rows="10" class="mt-1 w-full border border-slate-300 rounded px-3 py-2 font-normal">{{ old('body',$item->body) }}</textarea></label>
@endcomponent
@endsection
