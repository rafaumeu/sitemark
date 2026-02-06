@props(['title' => null, 'actions' => null])
<div class="w-full bg-background-secondary border border-border-primary rounded-[20px] p-8 sm:p-8">
    @if ($title)
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-content-primary font-heading tracking-tight">{{ $title }}</h3>

            @if ($actions)
                <div class="flex items-center gap-3">
                    {{ $actions }}
                </div>
            @endif
        </div>
    @endif
    <div class="text-content-secondary">
        {{ $slot }}
    </div>
</div>
