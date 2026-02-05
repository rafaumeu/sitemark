@props(['route', 'post' => null, 'put' => null, 'delete' => null, 'patch' => null])
@php
    $method = $post || $put || $delete || $patch ? 'POST' : 'GET';
@endphp
<form {{ $attributes->class(['flex flex-col gap-4']) }} action="{{ Route::has($route) ? route($route) : $route }}"
    method="{{ $method }}">
    @csrf
    @if ($put || $delete)
        @method('DELETE')
    @endif
    {{ $slot }}
</form>
