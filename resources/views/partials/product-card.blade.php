<a href="{{ route('products.show', $p->slug) }}" class="group block overflow-hidden rounded-lg border border-line bg-mist/40 transition hover:shadow-lg">
  <img src="{{ $p->image_url }}" alt="{{ $p->name }}" class="aspect-square w-full object-cover" loading="lazy">
  <div class="bg-white p-4">
    <span class="text-xs font-bold text-gold">{{ $p->category }}</span>
    <h3 class="mt-1 font-serif text-lg font-bold text-navy group-hover:underline">{{ $p->name }}</h3>
    <div class="mt-3 flex items-center justify-between text-sm">
      <span class="font-bold text-navy">Rp {{ number_format($p->price, 0, ',', '.') }}</span>
      <span class="text-xs italic {{ $p->stock > 0 ? 'text-slate-500' : 'text-red-600' }}">{{ $p->stock > 0 ? 'Stok '.$p->stock : 'Habis' }}</span>
    </div>
  </div>
</a>
