<x-layout.app>
    <x-container>
        <div class="absolute top-10 left-10 flex flex-col gap-4">
            <x-button :href="route('profile')" color="ghost">
                Update Profile
            </x-button>
            <x-button :href="route('links.create')" color="ghost">
                Create a new link
            </x-button>
            <x-button :href="route('logout')" color="ghost">
                Logout
            </x-button>
        </div>
        <div class="text-center space-y-2">
            <x-img src="storage/{{ $user->photo }}" alt="Profile Picture of {{ $user->name }}" />
            <div class="text-2xl font-bold tracking-wide">{{ $user->name }}</div>
            <div class="text-sm opacity-80">{{ $user->description }}</div>
            <ul class="space-y-2">
                @foreach ($links as $link)
                    <li class="flex items-center justify-center gap-2">
                        @unless ($loop->last)
                            <x-form :route="route('links.down', $link)" patch>
                                <x-button color="ghost">
                                    <x-icons.arrow-down class="w-6 h-6" />
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled color="ghost">
                                <x-icons.arrow-down class="w-6 h-6" />
                            </x-button>
                        @endunless

                        @unless ($loop->first)
                            <x-form :route="route('links.up', $link)" patch>
                                <x-button color="ghost">
                                    <x-icons.arrow-up class="w-6 h-6" />
                                </x-button>
                            </x-form>
                        @else
                            <x-button disabled color="ghost">
                                <x-icons.arrow-up class="w-6 h-6" />
                            </x-button>
                        @endunless
                        <x-button :href="route('links.edit', $link)" block outline color="primary">
                            {{ $link->name }}
                        </x-button>
                        <x-form :route="route('links.destroy', $link)" delete
                            onsubmit="return confirm('Tem certeza que deseja excluir este link?')">
                            <x-button type="submit" color="ghost">
                                <x-icons.trash class="h-6 w-6" />
                            </x-button>
                        </x-form>
                    </li>
                @endforeach
            </ul>
    </x-container>
</x-layout.app>
