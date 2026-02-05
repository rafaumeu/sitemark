<x-layout.app>
    <x-container>
        <x-card title="Create a new Link">
            <x-form :route="route('links.store')" post id="register-form">
                <x-input name="name" type="text" placeholder="Name" value="{{ old('name') }}" />
                <x-input name="link" type="text" placeholder="Link" value="{{ old('link') }}" />
            </x-form>
            <x-slot:actions>
                <x-a href="{{ route('dashboard') }}">Back</x-a>
                <x-button type="submit" form="register-form">Save</x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>
