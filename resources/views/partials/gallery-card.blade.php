<a href="{{ route('gallery.show', $g->slug) }}" class="group relative block aspect-[4/3] overflow-hidden rounded-lg">
  <img src="{{ $g->image_url }}" alt="{{ $g->title }}" class="h-full w-full object-cover transition duration-300 group-hover:scale-105" loading="lazy">
  <div class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-navy/90 to-transparent p-4 text-white">
    <p class="font-serif text-lg font-bold leading-tight">{{ $g->title }}</p>
    <p class="text-xs text-sun">{{ $g->category }}</p>
  </div>
</a>
