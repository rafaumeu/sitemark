@props(['name', 'label' => null, 'placeholder' => ''])
<div class="w-full">
    @if ($label)
        <label for="{{ $name }}" class="mb-1.5 block">
            <span class="text-sm font-normal text-content-primary font-sans">{{ $label }}</span>
        </label>
    @endif
    <div class="relative w-full">
        <textarea name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => 'w-full bg-transparent border border-transparent rounded-xl px-4 py-3 text-sm text-content-primary placeholder-content-tertiary focus:border-accent-orange focus:ring-1 focus:ring-accent-orange outilne-none transition-all duration-200 min-h-[120px] resize-y hover:border-border-primary']) }}>{{ $slot }}</textarea>
    </div>
    @error($name)
        <div class="text-accent-red text-xs mt-1.5 flex items-center gap-1 font-medium">
            <x-iconoir-xmark-circle-solid class="w-4 h-4" />
            <span class="text-content-secondary">{{ $message }}</span>
        </div>
    @enderror
</div>
