@props(['icon', 'variant' => 'primary', 'href' => null]);

@php
    $base = 'flex items-center justify-center w-10 h-10 rounded-xl transition-all duration-200';
    $variants = [
        'primary' => 'bg-accent-orange text-content-inverse hover:bg-orange-600',
        'secondary' => 'bg-background-secondary text-accent-orange hover:bg-background-tertiary',
        'tertiary' => 'bg-transparent text-white hover:bg-background-secondary',
    ];
    $classes = $base . ' ' . ($variants[$variant] ?? $variants['primary']);
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
