@props(['variant' => 'blue', 'label'])

@php
    $variants = [
        'blue' => 'bg-accent-blue text-content-inverse',
        'purple' => 'bg-accent-purple text-content-inverse',
        'green' => 'bg-accent-green text-content-inverse',
    ];
    $classes = $variants[$variant] ?? $variants['blue'];
@endphp

<div
    {{ $attributes->merge(['class' => "{$classes} px-2 py-0.5 rounded-2xl inline-flex items-center justify-center"]) }}>
    <span class="text-xs font-semibold font-sans">{{ $label ?? $slot }}</span>
</div>
