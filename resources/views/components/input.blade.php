@props(['name', 'label' => null, 'type' => 'text', 'prefix' => null, 'suffix' => null])

@php
    $hasError = $errors->has($name);
@endphp
<div class="w-full">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 block">
            <span class="text-sm font-normal text-content-primary font-sans">{{ $label }}</span>
        </label>
    @endif
    <div @class([
        'relative flex items-center gap-3 p-3 rounded-xl transition-all duration-200 border w-full',
        'border-transparent hover:border-border-primary' => !$hasError,
        'border-accent-red' => $hasError,
        'focus-within:border-accent-orange focus-within:ring-1 focus-within:ring-accent-orange' => $attributes->get(
            'class'),
    ])>
        @if ($prefix)
            <span class="text-content-tertiary select-none">{{ $prefix }}</span>
        @endif
        <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}"
            class="grow bg-transparent border-none text-content-primary placeholder-content-tertiary focus:ring-0 text-sm font-sans p-0 w-full outline-none"
            {{ $attributes->except('class') }} />
        @if ($suffix)
            <div class="flex items-center text-content-tertiary">
                {{ $suffix }}
            </div>
        @endif
    </div>
    @error($name)
        <div class="text-xs text-accent-red mt-1.5 flex items-center gap-1 font-medium">
            <x-iconoir-xmark-circle-solid class="w-4 h-4" />
            <span class="text-content-secondary">{{ $message }}</span>
        </div>
    @enderror
</div>
