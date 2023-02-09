@section('title')
    Підтвердження email
@endsection
<x-guest-layout>
    <div class="auth_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Реєстрація</span>
            </div>
        </div>
    </div>

    <x-auth-card>
        <div class="_container auth_container">
            <div class="register_block_verify_email">
                <div class="text_block_verify">
                   <p>
                       Дякуємо за реєстрацію!<br>
                       Перш ніж почати, чи могли б ви підтвердити свою електронну адресу, натиснувши посилання, яке ми щойно надіслали вам?
                       Якщо ви не отримали листа, ми з радістю надішлемо вам інший.
                   </p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="text_block_verify">
                        <p>Нове посилання для підтвердження було надіслано на електронну адресу, яку ви вказали під час реєстрації.</p>
                    </div>
                @endif

                <div class="mt-4 flex items-center justify-between">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <div>
                            <button type="submit" class="btn_resend_email">
                               <span>Відправити повторно посилання</span>
                            </button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn_logout">
                                <span>{{ __('Вихід') }}</span>
                        </button>
                    </form>
                </div>

            </div>
            <div class="logo_block_profile">
                <div class="logo_row_make">
                    <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
                </div>
            </div>
        </div>
    </x-auth-card>

</x-guest-layout>
