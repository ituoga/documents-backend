<x-layouts.guest>
    <div class="col-lg-8">
        <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
                <div class="card-body">
                    <h1>{{__('login')}}</h1>
                    <p class="text-medium-emphasis">{{__('sign_in_to_your_account')}}</p>
                    @include('components.layouts.flash-message')
                    <x-form action="{{ route('login') }}">
                        @csrf
                        <x-form.input id="email" name="email" value="{{ old('email') }}" title="{{__('email')}}" />
                        <x-form.input id="password" name="password" value="{{ old('password') }}"
                            title="{{__('password')}}" type="password" />

                        <x-form.submit>{{__('login')}}</x-form.submit>
                    </x-form>
                </div>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
                <div class="card-body text-center">
                    <div>
                        <h2>{{__('sign_up')}}</h2>
                        <a href="{{route('register')}}" class="btn btn-lg btn-outline-light mt-3"
                            type="button">{{__('register_now!')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.guest>
