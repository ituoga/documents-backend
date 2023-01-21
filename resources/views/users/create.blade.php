<x-layouts.main>
    <x-structure.card>
        <x-structure.card.header>
            {{__('add_user')}}
        </x-structure.card.header>

        <x-structure.card.body>
            <x-form action="{{ route('users.store')}}">
                @csrf
                <x-form.input id="user_email" name="user_email" value="{{old('user_email')}}"
                    title="{{__('user_email')}}" />

                <x-form.submit>{{__('add')}}</x-form.submit>
            </x-form>

        </x-structure.card.body>
    </x-structure.card>
</x-layouts.main>
