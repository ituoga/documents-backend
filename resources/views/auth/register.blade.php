<x-layouts.guest>
    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card mb-4 mx-4">
                        <div class="card-body p-4">
                            <h1>{{__('register')}}</h1>
                            <p class="text-medium-emphasis">{{__('create_your_account')}}</p>
                            <x-form action="{{ route('register') }}">
                                @csrf
                                <x-form.input id="name" name="name" value="{{ old('name') }}" title="{{__('name')}}" />
                                <x-form.input id="email" name="email" value="{{ old('email') }}"
                                    title="{{__('email')}}" />
                                <x-form.input id="password" name="password" value="{{ old('password') }}"
                                    title="{{__('password')}}" type="password" />
                                <x-form.input id="password_confirmation" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}" title="{{__('repeat_password')}}"
                                    type="password" />

                                <x-form.submit>{{__('create_account')}}</x-form.submit>
                            </x-form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
