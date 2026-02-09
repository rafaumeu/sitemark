@props([
    'variant' => 'primary',
    'block' => false,
    'href' => null,
])

@php
    $base = 'inline-flex items-center justify-center px-4 py-2 rounded-xl transition-all duration-200';
    $width = $block ? 'w-full' : '';
    $variants = [
        'primary' => 'bg-accent-orange text-content-inverse hover:bg-orange-600',
        'secondary' => 'bg-background-secondary text-accent-orange hover:bg-background-tertiary',
        'tertiary' => 'bg-transparent text-white hover:bg-background-secondary',
    ];
    $classes = $base . ' ' . $width . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp
@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
