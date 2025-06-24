
<x-layout.app>
    <x-container>
        <x-card title="Create a new Link">
            <x-form :route="route('links.create')" post id="form">
                <x-input name="name" placeholder="Name" value="{{ old('name')}}"/>
                <x-input name="link" placeholder="link" value="{{ old('link')}}"/>

            </x-form>
            <x-slot:actions>

                <x-a :href="route('dashboard')">Cancel</x-a>
                <x-button type="submit" form="form">Create a new link </x-button>
            </x-slot:actions>
        </x-card>
    </x-container>
</x-layout.app>