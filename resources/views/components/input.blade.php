@props(['name', 'prefix' => null])

<label class="input input-bordered w-full flex items-center gap-2">
    @if ($prefix)
        <span>{{ $prefix }}</span>
    @endif
    <input class="grow" {{ $attributes }} name="{{ $name }}">
    @error($name)
        <div class="text-small text-error">{{ $message }}</div>
    @enderror
</label>
