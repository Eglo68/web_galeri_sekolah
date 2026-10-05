@extends('admin.layout')
@section('title', $title)
@section('content')
<h1 class="mb-6 font-serif text-3xl font-bold text-navy">{{ $item->exists ? 'Ubah data' : 'Tambah data' }}</h1>
<form method="POST" enctype="multipart/form-data" action="{{ $item->exists ? route("admin.$route.update", $item->id) : route("admin.$route.store") }}" class="grid max-w-4xl gap-5 rounded-lg border border-line bg-white p-6 md:grid-cols-2">
  @csrf
  @if($item->exists) @method('PUT') @endif
  @foreach($fields as $f)
    @php
      $n = $f['name'];
      $val = old($n, $item->$n instanceof \DateTimeInterface ? $item->$n->format('Y-m-d') : $item->$n);
      $cls = 'mt-1 w-full rounded border border-line bg-white px-3 py-2';
    @endphp
    <div class="{{ $f['type'] === 'textarea' ? 'md:col-span-2' : '' }}">
      <label for="f-{{ $n }}" class="text-sm font-semibold text-navy">{{ $f['label'] }}</label>
      @switch($f['type'])
        @case('textarea')
          <textarea id="f-{{ $n }}" name="{{ $n }}" rows="{{ $f['rows'] ?? 4 }}" class="{{ $cls }}">{{ $val }}</textarea> @break
        @case('select')
          <select id="f-{{ $n }}" name="{{ $n }}" class="{{ $cls }}">
            @foreach($f['options'] as $k => $o) @php $ov = is_int($k) ? $o : $k; @endphp
              <option value="{{ $ov }}" @selected($val == $ov)>{{ $o }}</option>
            @endforeach
          </select> @break
        @case('file')
          @if($item->image)<img src="{{ $item->image_url }}" alt="" class="my-2 h-24 rounded">@endif
          <input id="f-{{ $n }}" type="file" name="image" accept="image/*" class="{{ $cls }}"> @break
        @default
          <input id="f-{{ $n }}" type="{{ $f['type'] }}" name="{{ $n }}" value="{{ $val }}" class="{{ $cls }}">
      @endswitch
      @error($n)<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
    </div>
  @endforeach
  <div class="flex gap-3 md:col-span-2">
    <button class="rounded bg-navy px-6 py-2.5 font-semibold text-white hover:bg-navy-soft">Simpan</button>
    <a href="{{ route("admin.$route.index") }}" class="rounded border border-line px-6 py-2.5 font-semibold text-navy">Batal</a>
  </div>
</form>
@endsection
