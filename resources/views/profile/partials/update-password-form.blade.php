<section>
    <header class="mb-4">
        <h2 class="h3 text-success">
            {{ __('Atualizar Password') }}
        </h2>
        <p class="text-muted">
            {{ __('Use uma password segura.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="row g-3">
        @csrf
        @method('put')

        <div class="col-md-6">
            <x-input-label for="update_password_current_password" :value="__('Password atual')" class="form-label"/>
            <x-text-input id="update_password_current_password" name="current_password" type="password" class="form-control mt-1" autocomplete="current-password" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger mt-2" />
        </div>

        <div class="col-md-6">
            <x-input-label for="update_password_password" :value="__('Nova Password')" class="form-label"/>
            <x-text-input id="update_password_password" name="password" type="password" class="form-control mt-1" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-2" />
        </div>

        <div class="col-md-6">
            <x-input-label for="update_password_password_confirmation" :value="__('Confirmar Password')" class="form-label"/>
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="form-control mt-1" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger mt-2" />
        </div>

        <div class="col-12 d-flex justify-content-end">
            <x-primary-button class="btn btn-success">
                {{ __('Atualizar') }}
            </x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ms-3 text-success">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
