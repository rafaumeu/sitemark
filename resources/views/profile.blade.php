<x-layout.app>
    <x-container>
        <x-card title="Profile">

            <x-form :route="route('profile')" put id="register-form">
                <div class="flex items-center gap-2">
                    <x-img src="storage/{{ $user->photo }}" alt="Profile Picture of {{ $user->name }}" />
                    <x-file-input name="photo" />
                </div>
                <x-input name="name" type="text" placeholder="Name" value="{{ old('name', $user->name) }}" />
                <x-textarea name="description">{{ old('description', $user->description) }}
                </x-textarea>
                <x-input name="handler" prefix="biolinks.com.br/" type="text" placeholder="Handler"
                    value="{{ old('handler', $user->handler) }}" />
            </x-form>
            <x-slot:actions>
                <x-a href="{{ route('dashboard') }}">Cancel</x-a>
                <x-button type="submit" form="register-form">Update Link</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
