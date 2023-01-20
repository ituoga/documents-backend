<x-layouts.main>

    <x-structure.actions>
        <x-structure.links tag="default" href="{{ route('users.create') }}"> {{__('add_user')}}
        </x-structure.links>
    </x-structure.actions>

    <x-structure.card>
        <x-structure.card.header>
            {{__('users')}}
        </x-structure.card.header>

        <x-structure.card.body>
            <x-structure.table :headers="['#', 'name', 'email', '']">
                @forelse($users as $user)
                <x-structure.table.tr>
                    <x-structure.table.td>{{ $user->id }}</x-structure.table.td>
                    <x-structure.table.td>{{ $user->name }}</x-structure.table.td>
                    <x-structure.table.td>{{ $user->email }}</x-structure.table.td>
                    <x-structure.table.td>
                        <x-structure.actions>

                            <x-structure.actions.delete :action="route('users.destroy', $user)" />
                        </x-structure.actions>
                    </x-structure.table.td>
                </x-structure.table.tr>
                @empty
                <x-structure.table.tr>
                    <x-structure.table.td colspan="4">{{__('no_data')}}</x-structure.table.td>
                </x-structure.table.tr>
                @endforelse

            </x-structure.table>
        </x-structure.card.body>
    </x-structure.card>

</x-layouts.main>
