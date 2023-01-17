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
            <div class="col-sm-3">
                @forelse($users as $user)
                <a class="btn btn-sm btn-primary mt-2"
                    href="{{route('shared_files.index', ['user' => $user])}}">{{$user->name}}</a>

                @empty
                {{__('nobody_shared_files_with_you')}}
                @endforelse
            </div>
            <x-structure.table :headers="['#', 'group_name', 'document_direction', 'download']">
                @forelse($files as $file)
                <x-structure.table.tr>
                    <x-structure.table.td>{{ $file->id }}</x-structure.table.td>
                    <x-structure.table.td>{{ $file->group_name }}</x-structure.table.td>
                    <x-structure.table.td>{{ $file->document_direction }}</x-structure.table.td>
                    <x-structure.table.td>
                        <a class="btn btn-sm btn-secondary" href="{{route('download', ['id' => $file])}}">download</a>
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
