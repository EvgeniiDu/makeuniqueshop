<div>
    <div class="auth_header">
        <div class="header_block">
            <div class="block">
                <img src="{{asset('assets/images/arrow_icon.png')}}" alt="">
                <span>Зміна пароля</span>
            </div>
        </div>
    </div>
    <div class="_container password_container_reset">
        <div class="reset_block">
            @if(Session::has('password_success'))
                <div class="alert alert-success" role="alert">{{ Session::get('password_success') }}</div>
            @endif
            @if(Session::has('password_error'))
                <div class="alert alert-danger" role="alert">{{ Session::get('password_error') }}</div>
            @endif
            <form wire:submit.prevent="changePassword">
                <div class="mt-4 input_block_reset">
                    <div class="label_block">
                        <x-input-label for="current_password" :value="__('Поточний пароль')"/>
                    </div>
                    <x-text-input id="current_password" class="block mt-1 w-full input_line" type="password"
                                  name="current_password" wire:model.lazy="current_password" required/>

                    @error('current_password') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <!-- Password -->
                <div class="mt-4 input_block_reset">
                    <div class="label_block">
                        <x-input-label for="new_password" :value="__('Новий пароль')"/>
                    </div>
                    <x-text-input id="new_password" class="block mt-1 w-full input_line" type="password" name="password"
                                  wire:model="password" required/>

                    @error('password') <p class="text-danger">{{ $message }}</p> @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mt-4 input_block_reset">
                    <div class="label_block">
                        <x-input-label for="password_confirmation" :value="__('Повторіть пароль')"/>
                    </div>
                    <x-text-input id="password_confirmation" class="block mt-1 w-full input_line"
                                  type="password"
                                  name="password_confirmation" wire:model="password_confirmation" required/>

                    @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
                </div>
                <button class="button_change"  type="submit">
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

</div>
