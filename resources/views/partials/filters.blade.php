<form method="get" class="max-w-6xl mx-auto px-4 mt-6 flex flex-wrap items-center gap-2">
 @php $cur = request('kategori'); $u = fn($c) => request()->fullUrlWithQuery(['kategori' => $c, 'page' => null]); @endphp
 <a href="{{ $u(null) }}" class="px-3 py-1 rounded text-xs font-semibold {{ !$cur ? 'bg-navy text-white' : 'bg-mist text-navy' }}">Semua</a>
 @foreach($cats as $c)<a href="{{ $u($c) }}" class="px-3 py-1 rounded text-xs font-semibold {{ $cur === $c ? 'bg-navy text-white' : 'bg-mist text-navy' }}">{{ $c }}</a>@endforeach
 @if($cur)<input type="hidden" name="kategori" value="{{ $cur }}">@endif
 <input name="q" value="{{ request('q') }}" placeholder="Cari..." class="ml-auto border border-slate-300 rounded px-3 py-1.5 text-sm bg-white w-full sm:w-56">
</form>
