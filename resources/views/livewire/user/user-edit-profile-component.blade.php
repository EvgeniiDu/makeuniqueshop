<div>
    <div class="auth_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Персональні дані</span>
            </div>
        </div>
    </div>
    <div class="_container profile_main_container">
        <div class="profile_data_block">
            <div class="menu_block">
                <div class="line_name">
                    <img src="{{ asset('assets/images/icon_profile.png') }}" alt="" class="icon_profile">
                    <span>{{ Auth::user()->name }} {{ Auth::user()->lastname }}</span>
                </div>
                <div class="nav_block">
                    <ul class="nav_items">
                        <li class="nav_item">
                            <img src="{{ asset('assets/images/icon_u.png') }}" alt="" class="icon_profile">
                            <a href="{{route('user.profile')}}"><span
                                    style="text-decoration: underline; font-weight: 500;">Персональні дані</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_heart.png') }}" alt="" class="icon_profile">
                            <a href="{{route('product.wishlist')}}"><span>Список обраного</span></a>
                        </li>
                        <li class="mt-2 nav_item">
                            <img src="{{ asset('assets/images/icon_folder.png') }}" alt="" class="icon_profile">
                            <a href="{{route('user.myorders')}}"><span>Ваші замовлення</span></a>
                        </li>
                        <li class="mt-5 nav_item exit">
                            <div>
                                <img src="{{ asset('assets/images/icon_exit.png') }}" alt="" class="icon_profile">
                            </div>
                            <div class="form_exit">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="/logout"
                                       onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                        {{ __('Вихід') }}
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="info_block">
                <div class="line_header">
                    <span>Персональні дані</span>
                </div>
                <form wire:submit.prevent="editProfile">
                    <div class="input_block_profile">
                        <div class="input_item">
                            <div class="label_name">
                                <label for="lastname">Прізвище</label>
                            </div>
                            <input id="lastname" class="block mt-1 w-full input_line_profile" type="text" name="lastname"   wire:model="lastname" />
                            @error('lastname') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="input_item">
                            <div class="label_name">
                                <label for="name">Ім'я</label>
                            </div>
                            <input id="name" class="block mt-1 w-full input_line_profile" type="text" name="name" value="{{ Auth::user()->name }}"  wire:model="name"/>
                            @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="input_block_profile">
                        <div class="input_item">
                            <div class="label_name">
                                <label for="email">Email</label>
                            </div>
                            <input id="email" class="block mt-1 w-full input_line_profile" type="text" name="email" value="{{ Auth::user()->email }}"  wire:model="email"/>
                            @error('email') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                        <div class="input_item" wire:ignore>
                            <div class="label_name">
                                <label for="phone">Телефон</label>
                            </div>
                            <input id="phone-mask" class="block mt-1 w-full input_line_profile" type="text" name="phone" onchange="update(this.value)" value="{{ Auth::user()->phone }}"  />
                            @error('phone') <p class="text-danger">{{ $message }}</p> @enderror
                        </div>
                    </div>
                    <div class="btn_save_edit">
                        <input type="submit" value="Зберегти">
                    </div>
                </form>
            </div>
        </div>
        <div class="logo_block_profile" style="margin-top: 150px">
            <div class="logo_row_make">
                <img src="{{asset('assets/images/logo/MakeUnique.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        $(document).ready(function (){
         $("#phone-mask").mask("+380(99)999-99-99")
        })
        function update(phone){
            console.log(phone);
            @this.set('phone', phone)
        }
    </script>
@endpush
