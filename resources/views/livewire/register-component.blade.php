@section('title')
    Реєстрація
@endsection


<x-guest-layout>
    <div class="auth_header">
        <div class="header_block">
            <div class="block_nav_breadcrumbs">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <div class="breadcrumbs_block">
                    {{ Breadcrumbs::render('register') }}
                </div>
            </div>
        </div>
    </div>
    <div class="_container auth_register_container">
        <div class="register_block">
            <div>
                <form method="POST" action="{{ route('register') }}" class="form_block">
                @csrf
                <!-- Lastname -->
                    <div class="mt-4 input_block">
                        <div class="label_block">
                            <x-input-label for="lastname" :value="__('Ваше прізвище')"/>
                        </div>
                        <x-text-input id="lastname" class="mt-1 w-full input_line" type="text" name="lastname"
                                      :value="old('lastname')" placeholder="Ваше прізвище"/>
                        <x-input-error :messages="$errors->get('lastname')" class="mt-2"/>
                    </div>


                    <!-- Name -->
                    <div class="mt-4" class="input_block">
                        <div class="label_block">
                            <x-input-label for="name" :value="__('Ваше ім\'я')"/>
                        </div>
                        <x-text-input id="name" class="block mt-1 w-full input_line" type="text" name="name"
                                      :value="old('name')" placeholder="Ваше ім'я"/>

                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Phone number -->
                    <div class="mt-4" class="input_block">
                        <div class="label_block">
                            <x-input-label for="phone" :value="__('Телефон')"/>
                        </div>
                        <x-text-input id="phone" class="block mt-1 w-full input_line" type="text" name="phone"
                                      :value="old('phone')" placeholder="+38(___)-___-__-__" required/>

                        <x-input-error :messages="$errors->get('phone')" class="mt-2"/>
                    </div>
                    <!-- Email Address -->
                    <div class="mt-4" class="input_block">
                        <div class="label_block">
                            <x-input-label for="email" :value="__('Email')"/>
                        </div>
                        <x-text-input id="email" class="block mt-1 w-full input_line" type="email" name="email"
                                      :value="old('email')" placeholder="Email" required/>

                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4" class="input_block">
                        <div class="label_block">
                            <x-input-label for="password" :value="__('Пароль')"/>
                        </div>
                        <x-text-input id="password" class="block mt-1 w-full input_line"
                                      type="password"
                                      name="password"
                                      placeholder="Пароль"
                                      required autocomplete="new-password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4" class="input_block">
                        <div class="label_block">
                            <x-input-label for="password_confirmation" :value="__('Повторіть пароль')"/>
                        </div>
                        <x-text-input id="password_confirmation" class="block mt-1 w-full input_line"
                                      type="password"
                                      placeholder="Повторіть пароль"
                                      name="password_confirmation" required/>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>

                    <div class="btn_auth_container">
                        <x-primary-button class="button_auth">
                            <div class="btn_reg">
                                <span>{{ __('Реєстрація') }}</span>
                            </div>
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
        <div class="logo_social_block register">
            <div class="social_block_register">
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
    </div>
</x-guest-layout>


<script src="{{ asset('assets/js/jquery.min.js') }} "></script>
<script src="{{ asset('assets/js/jquery.maskedinput.min.js') }}"></script>
<script>
    $(document).ready(function (){
        $("#phone").mask("+380(99)999-99-99")
    })
</script>

