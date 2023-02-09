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
    <div class="forgot_container_reset">
        <div class="reset_block">
            <div class="forgot_password_box ">
                <p>Забули свій пароль?</p>
                <span>Нема проблем. Просто повідомте нам свою електронну адресу, і ми надішлемо вам електронною поштою посилання для скидання пароля, за яким ви зможете вибрати новий.</span>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')"/>

            <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
                <div class="forgot_input_box">
                    <div class="input_block_reset">
                        <div class="label_block">
                            <x-input-label for="email" :value="__('Email')"/>
                        </div>
                        <input id="email" class="block mt-1 input_line" type="email" name="email"
                                      :value="old('email')" placeholder="Email" required autofocus/>

                    </div>

                    <div class="btn_reset_container">
                        <x-primary-button class="button_login">
                            <div class="btn_login">
                                <span>{{ __('Відправити') }}</span>
                            </div>
                        </x-primary-button>
                    </div>
                </div>
                <div style="margin-left: 150px">
                    <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                </div>
            </form>
        </div>
        <div class="logo_block_profile">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</x-guest-layout>
