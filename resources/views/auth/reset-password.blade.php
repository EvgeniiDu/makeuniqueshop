@section('title')
    Відновлення пароля
@endsection

<x-guest-layout>
    <div class="auth_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Відновлення пароля</span>
            </div>
        </div>
    </div>
    <div class="_container password_container_reset">
        <div class="reset_block">
            <form method="POST" action="{{ route('password.update') }}">
            @csrf
            <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email Address -->
                <div class="input_block_reset">
                    <div class="label_block">
                        <x-input-label for="email" :value="__('Email')"/>
                    </div>
                    <x-text-input id="email" class="block mt-1 w-full input_line" type="email" name="email"
                                  :value="old('email', $request->email)" required autofocus/>

                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>

                <!-- Password -->
                <div class="mt-4 input_block_reset">
                    <div class="label_block">
                        <x-input-label for="password" :value="__('Пароль')"/>
                    </div>
                    <x-text-input id="password" class="block mt-1 w-full input_line" type="password" name="password"
                                  required/>

                    <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 input_block_reset">
                    <div class="label_block">
                        <x-input-label for="password_confirmation" :value="__('Повторіть пароль')"/>
                    </div>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full input_line"
                                  type="password"
                                  name="password_confirmation" required/>

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                </div>

                <button class="button_change" type="submit">
                    <span>{{ __('Змінити') }}</span>
                </button>
            </form>
        </div>
        <div class="logo_block_profile">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</x-guest-layout>
