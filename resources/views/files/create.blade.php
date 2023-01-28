<x-layouts.main>
    <x-structure.card>
        <x-structure.card.header>
            {{__('add_file')}}
        </x-structure.card.header>

        <x-structure.card.body>
            <x-form action="{{ route('files.store')}}">
                @csrf
                {{--
                <x-form.input id="group_name" name="group_name" value="{{old('group_name')}}"
                    title="{{__('group_name')}}" /> --}}

                <x-form.select id="document_direction" title="{{__('document_direction')}}" name="document_direction"
                    :options="$document_directions" :selected="'incoming'" />

                <x-form.file id="file" name="files[]" value="{{old('file')}}" title="{{__('files')}}"
                    multiple="multiple">
                </x-form.file>
                <x-form.submit>{{__('add')}}</x-form.submit>
            </x-form>

        </x-structure.card.body>
    </x-structure.card>
</x-layouts.main>
