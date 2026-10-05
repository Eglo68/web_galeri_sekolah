@props(['src' => null, 'alt' => ''])
@if($src)<img src="{{ $src }}" alt="{{ $alt }}" loading="lazy" {{ $attributes->merge(['class' => 'object-cover']) }}>
@else<div {{ $attributes->merge(['class' => 'bg-gradient-to-br from-navy to-[#12407f] grid place-items-center text-white/40 text-xs']) }}>SMKN 4 Bogor</div>@endif
