@props(['title', 'desc' => null, 'crumbs' => []])
<div class="border-b border-line bg-mist/60">
  <div class="mx-auto max-w-7xl px-4 py-10">
    <nav class="mb-4 text-xs text-slate-500" aria-label="Breadcrumb">
      <a href="{{ route('home') }}" class="hover:text-navy">Beranda</a>
      @foreach($crumbs as $label => $url)
        <span class="mx-1">/</span>
        @if($url)<a href="{{ $url }}" class="hover:text-navy">{{ $label }}</a>@else<span class="font-semibold text-gold">{{ $label }}</span>@endif
      @endforeach
    </nav>
    <h1 class="font-serif text-4xl font-bold text-navy">{{ $title }}</h1>
    @if($desc)<p class="mt-2 max-w-2xl text-slate-600">{{ $desc }}</p>@endif
  </div>
</div>
