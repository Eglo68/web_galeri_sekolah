<a href="{{ route('galleries.show', $g->slug) }}" class="group relative block overflow-hidden rounded bg-slate-200">
 <x-img :src="$g->image_url" :alt="$g->title" class="w-full h-56 group-hover:scale-105 transition duration-500"/>
 <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy/90 to-transparent p-3 text-white"><p class="text-[10px] uppercase tracking-wide text-gold">{{ $g->category }}</p><p class="font-semibold text-sm">{{ $g->title }}</p></div></a>
