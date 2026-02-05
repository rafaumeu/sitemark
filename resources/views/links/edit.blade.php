<x-layout.app>
    <x-container>
        <x-card title="Edit a Link :: id {{ $link->id }}">

            <x-form :route="route('links.edit', $link)" put id="register-form">
                <x-input name="name" type="text" placeholder="Name" value="{{ old('name', $link->name) }}" />
                <x-input name="link" type="text" placeholder="Link" value="{{ old('link', $link->link) }}" />
            </x-form>
            <x-slot:actions>
                <x-a href="{{ route('dashboard') }}">Back</x-a>
                <x-button type="submit" form="register-form">Save</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
