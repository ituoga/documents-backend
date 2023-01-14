<x-layouts.main>

    <x-structure.actions>
        <x-structure.links tag="default" href="{{ route('files.create') }}"> {{__('add_file')}}
        </x-structure.links>
    </x-structure.actions>

    <x-structure.card>
        <x-structure.card.header>
            {{__('files')}}
        </x-structure.card.header>

        <x-structure.card.body>
            <div class="table-responsive">
                table
            </div>
        </x-structure.card.body>
    </x-structure.card>

</x-layouts.main>
