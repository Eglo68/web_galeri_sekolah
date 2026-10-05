<div class="flex flex-wrap items-end justify-between gap-3 mb-5">
 <div><h1 class="font-serif font-bold text-3xl text-navy">{{ $title }}</h1><p class="text-xs text-slate-500">Admin / {{ $title }}</p></div>
 <div class="flex gap-2"><form class="flex"><input name="q" value="{{ request('q') }}" placeholder="Cari..." class="border border-slate-300 rounded px-3 py-2 text-sm bg-white"></form>
 <a href="{{ $create }}" class="bg-navy text-white text-sm font-semibold px-4 py-2 rounded">+ Tambah</a></div></div>
