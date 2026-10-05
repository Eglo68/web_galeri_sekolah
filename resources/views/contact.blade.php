@extends('layout')
@section('title', 'Kontak')
@section('content')
<x-page-header title="Kontak kami" desc="Calon siswa, alumni, atau mitra industri — kirim pertanyaan Anda, kami balas dalam 1–2 hari kerja." :crumbs="['Kontak' => null]" />
<div class="mx-auto grid max-w-7xl gap-8 px-4 py-12 md:grid-cols-3">
  <aside class="space-y-4 rounded-lg border border-line bg-white p-6 text-sm">
    <h2 class="font-serif text-xl font-bold text-navy">Informasi sekolah</h2>
    <div><p class="font-semibold text-navy">Alamat</p><p>{{ config('school.address') }}</p></div>
    <div><p class="font-semibold text-navy">Telepon</p><p>{{ config('school.phone') }}</p></div>
    <div><p class="font-semibold text-navy">Email</p><p>{{ config('school.email') }}</p></div>
    <div class="border-t border-line pt-4"><p class="mb-1 font-semibold text-navy">Jam layanan</p>
      @foreach(config('school.hours') as $d => $h)<div class="flex justify-between"><span>{{ $d }}</span><span>{{ $h }}</span></div>@endforeach</div>
    <a href="{{ config('school.maps') }}" target="_blank" rel="noopener" class="inline-block rounded bg-sun px-4 py-2 font-semibold text-navy">Buka di Google Maps</a>
  </aside>
  <section class="rounded-lg border border-line bg-white p-6 md:col-span-2">
    <h2 class="font-serif text-xl font-bold text-navy">Kirim pesan</h2>
    @if(session('ok'))<p class="mt-4 rounded border border-green-200 bg-green-50 px-4 py-2 text-sm text-green-800">{{ session('ok') }}</p>@endif
    <form method="POST" action="{{ route('contact.send') }}" class="mt-4 grid gap-4 md:grid-cols-2">
      @csrf
      @php $in = 'mt-1 w-full rounded border border-line px-3 py-2'; @endphp
      <label class="text-sm font-semibold text-navy">Nama<input name="name" value="{{ old('name') }}" class="{{ $in }}" required>@error('name')<span class="text-xs font-normal text-red-600">{{ $message }}</span>@enderror</label>
      <label class="text-sm font-semibold text-navy">Email<input type="email" name="email" value="{{ old('email') }}" class="{{ $in }}" required>@error('email')<span class="text-xs font-normal text-red-600">{{ $message }}</span>@enderror</label>
      <label class="text-sm font-semibold text-navy md:col-span-2">Keperluan
        <select name="subject" class="{{ $in }}">@foreach(['Informasi PPDB','Kerja Sama','Lainnya'] as $s)<option @selected(old('subject')===$s)>{{ $s }}</option>@endforeach</select></label>
      <label class="text-sm font-semibold text-navy md:col-span-2">Pesan<textarea name="body" rows="6" class="{{ $in }}" required>{{ old('body') }}</textarea>@error('body')<span class="text-xs font-normal text-red-600">{{ $message }}</span>@enderror</label>
      <label class="flex items-center gap-2 text-sm md:col-span-2"><input type="checkbox" name="agree" value="1" required> Saya setuju data saya disimpan untuk keperluan balasan.</label>
      <div class="md:col-span-2"><button class="rounded bg-navy px-6 py-3 font-semibold text-white hover:bg-navy-soft">Kirim pesan</button></div>
    </form>
  </section>
</div>
@endsection
