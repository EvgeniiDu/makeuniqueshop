@section('title')
    Авторизація
@endsection
<x-guest-layout>
    <div class="auth_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('login') }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container auth_container_login">
        <div class="login_block">
            <div>
                <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                    <div class="input_block">
                        <div class="label_block">
                            <x-input-label for="email" :value="__('Email')" />
                        </div>
                        <x-text-input id="email" class="block mt-1 w-full input_line" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4 input_block">
                        <div class="label_block">
                            <x-input-label for="password" :value="__('Пароль')" />
                        </div>
                        <x-text-input id="password" class="block mt-1 w-full input_line"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" placeholder="Пароль" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    {{--                <div class="block mt-4">--}}
                    {{--                    <label for="remember_me" class="inline-flex items-center">--}}
                    {{--                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">--}}
                    {{--                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>--}}
                    {{--                    </label>--}}
                    {{--                </div>--}}

                    <div class="btn_login_container">
                        @if (Route::has('password.request'))
                            <a class="restoration_pass" href="{{ route('password.request') }}">
                                <span>{{ __('Відновлення паролю') }}</span>
                            </a>
                        @endif

                        <x-primary-button class="button_login">
                            <div class="btn_login">
                                <span>{{ __('Авторизація') }}</span>
                            </div>
                        </x-primary-button>
                    </div>
                </form>
            </div>
            <div class="social_block">
                <div>
                    <span class="header_social">Вхід через Google</span>
                </div>
                <div class="google_block">
                    <img src="{{asset('assets/images/google_icon.png')}}" alt="">
                </div>
                <div>
                    <a class="link_google" href="{{ route('auth.google') }}">Авторизація</a>
                </div>
            </div>
        </div>
        <div class="logo_block_profile">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</x-guest-layout>
