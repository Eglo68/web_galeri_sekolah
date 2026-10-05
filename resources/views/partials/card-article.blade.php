<a href="{{ route('articles.show', $a->slug) }}" class="group bg-white border border-slate-200 rounded overflow-hidden hover:shadow-md transition block">
 <x-img :src="$a->image_url" :alt="$a->title" class="w-full h-44"/>
 <div class="p-4"><p class="text-[11px] font-bold uppercase tracking-wide text-gold">{{ $a->category }}</p>
 <h3 class="font-serif font-semibold text-lg text-navy mt-1 group-hover:text-gold line-clamp-2">{{ $a->title }}</h3>
 <p class="text-sm text-slate-600 mt-1 line-clamp-2">{{ $a->excerpt }}</p>
 <p class="text-xs text-slate-400 mt-3">{{ $a->published_at?->translatedFormat('d M Y') }}</p></div></a>
