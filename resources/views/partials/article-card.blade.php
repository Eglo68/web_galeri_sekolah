<a href="{{ route('articles.show', $a->slug) }}" class="group block overflow-hidden rounded-lg border border-line bg-white transition hover:shadow-lg">
  <img src="{{ $a->image_url }}" alt="{{ $a->title }}" class="aspect-video w-full object-cover" loading="lazy">
  <div class="p-5">
    <span class="text-xs font-bold text-gold">{{ $a->category }}</span>
    <h3 class="mt-1 font-serif text-xl font-bold leading-snug text-navy group-hover:underline">{{ $a->title }}</h3>
    <p class="mt-2 line-clamp-2 text-sm text-slate-600">{{ $a->excerpt }}</p>
    <p class="mt-3 text-xs text-slate-400">{{ $a->published_at?->translatedFormat('d F Y') }}</p>
  </div>
</a>
