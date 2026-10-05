@extends('admin.layout')
@section('title', $title)
@section('content')
<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
  <div><h1 class="font-serif text-3xl font-bold text-navy">{{ $title }}</h1><p class="text-sm text-slate-500">{{ $items->total() }} data</p></div>
  <div class="flex gap-2">
    <form class="flex gap-2"><input name="q" value="{{ request('q') }}" placeholder="Cari..." class="rounded border border-line bg-mist px-3 py-2 text-sm"><button class="rounded border border-line px-3 text-sm font-semibold text-navy">Cari</button></form>
    <a href="{{ route("admin.$route.create") }}" class="rounded bg-navy px-4 py-2 text-sm font-semibold text-white hover:bg-navy-soft">Tambah baru</a>
  </div>
</div>
@if(session('ok'))<p class="mb-4 rounded border border-green-200 bg-green-50 px-4 py-2 text-sm text-green-800">{{ session('ok') }}</p>@endif
<div class="overflow-x-auto rounded-lg border border-line bg-white">
  <table class="w-full text-left text-sm">
    <thead class="bg-mist text-navy"><tr><th class="p-3">Gambar</th>@foreach($columns as $c)<th class="p-3">{{ $c['label'] }}</th>@endforeach<th class="p-3 text-right">Aksi</th></tr></thead>
    <tbody>
    @forelse($items as $i)
      <tr class="border-t border-line">
        <td class="p-3"><img src="{{ $i->image_url }}" alt="" class="h-12 w-12 rounded object-cover"></td>
        @foreach($columns as $c)
          @php $v = data_get($i, $c['key']); @endphp
          <td class="p-3">
            @switch($c['type'] ?? 'text')
              @case('money') Rp {{ number_format($v, 0, ',', '.') }} @break
              @case('date') {{ $v?->translatedFormat('d M Y') ?? '—' }} @break
              @case('badge') <span class="rounded bg-mist px-2 py-0.5 text-xs font-semibold text-navy">{{ $v }}</span> @break
              @default {{ $v }}
            @endswitch
          </td>
        @endforeach
        <td class="whitespace-nowrap p-3 text-right">
          <a href="{{ route("admin.$route.edit", $i->id) }}" class="font-semibold text-navy hover:underline">Ubah</a>
          <form method="POST" action="{{ route("admin.$route.destroy", $i->id) }}" class="ml-3 inline" onsubmit="return confirm('Hapus data ini?')">@csrf @method('DELETE')<button class="font-semibold text-red-700 hover:underline">Hapus</button></form>
        </td>
      </tr>
    @empty
      <tr><td colspan="{{ count($columns) + 2 }}" class="p-8 text-center text-slate-500">Belum ada data. Klik “Tambah baru” untuk memulai.</td></tr>
    @endforelse
    </tbody>
  </table>
</div>
<div class="mt-6">{{ $items->links() }}</div>
@endsection
