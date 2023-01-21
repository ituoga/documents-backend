<x-layouts.main>
    <x-structure.card>
        <x-structure.card.header>
            {{__('update_file')}}
        </x-structure.card.header>

        <x-structure.card.body>
            <x-form action="{{ route('files.update', $file)}}">
                @csrf
                @method('PUT')
                <x-form.input id="group_name" name="group_name" value="{{$file->group_name}}"
                    title="{{__('group_name')}}" />
                <x-form.input id="document_direction" name="document_direction" value="{{$file->document_direction}}"
                    title="{{__('document_direction')}}" />
                <a class="btn btn-sm btn-secondary" href="{{route('download', ['id' => $file])}}">download</a>
                <x-form.file id="file" name="file" value="{{old('file')}}" title="{{__('file')}}"></x-form.file>
                <x-form.submit>{{__('update')}}</x-form.submit>
            </x-form>

        </x-structure.card.body>
    </x-structure.card>
</x-layouts.main>
