<x-layout.app>
    <x-container>
        <div class="absolute top-10 left-10 flex flex-col gap-4">
            <x-button ghost :href="route('profile')">Update Profile </x-button>
            <x-button ghost :href="route('links.create')">Create a new Link </x-button>
               <x-button ghost :href="route('logout')">Logout</x-button>
        </div>

        <div class="text-center space-y-2">
            <x-img src="/storage/{{ $user->photo}}" alt="Photo Profile" />
            <div class="font-bold text-2xl tracking-wide"> {{$user->name}}  {{ $user->lastname}}</div>
            <div class="text-sm opacity-80"> {{ $user->description }}</div>

            <ul class="space-y-2">
                @foreach ($links as $link)
                <li class="flex items-center justify-center gap-2">

                    @unless ($loop->last)
                    <x-form :route="route('links.down', $link)" patch>

                        <x-button ghost>
                            <x-icons.arrow-down class="w-6 h-6" />
                        </x-button>
                    </x-form>

                    @else
                        <x-button disabled ghost> 
                              <x-icons.arrow-down class="w-6 h-6" />
                        </x-button>

                    @endunless


                    @unless ($loop->first)
                    <x-form :route="route('links.up', $link)" patch>

                        <x-button ghost>
                            <x-icons.arrow-up class="w-6 h-6" />
                        </x-button>
                    </x-form>
                    
                    @else
                        <x-button disabled ghost> 
                              <x-icons.arrow-down class="w-6 h-6" />
                        </x-button>

                    @endunless
                    <x-button href="{{ route('links.edit', $link) }}" block outline info>
                        {{ $link->name}}
                    </x-button>

                    <x-form :route="route('links.destroy', $link)" delete onsubmit="return confirm('Tem certeza que deseja excluir')">

                        <x-button ghost>
                            <x-icons.trash class="w-6 h-6" />
                        </x-button>
                    </x-form>
                </li>

                @endforeach
            </ul>
        </div>

        <x-slot:actions>

            <x-a :href="route('dashboard')">Cancel</x-a>
            <x-button type="submit" form="login-form">Create a new link </x-button>
        </x-slot:actions>

    </x-container>
</x-layout.app>