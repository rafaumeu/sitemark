<x-layout.app>
    <x-container>
        <div class="text-center space-y-2">
            <x-img src="storage/{{ $user->photo }}" alt="Profile Picture of {{ $user->name }}" />
            <div class="text-2xl font-bold tracking-wide">{{ $user->name }}</div>
            <div class="text-sm opacity-80">{{ $user->description }}</div>
            <ul class="space-y-2">
                @foreach ($user->links as $link)
                    <li class="flex items-center justify-center gap-2">
                        <x-button :href="$link->link" block outline color="primary" target="_blank">
                            {{ $link->name }}
                        </x-button>
                    </li>
                @endforeach
            </ul>
    </x-container>
</x-layout.app>
