<section>
    <header class="mb-4">
        <h2 class="h3 text-success">
            {{ __('Dados de Usuario') }}
        </h2>
        <p class="text-muted">
            {{ __("Atualize os seus dados pessoais.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="row g-3">
        @csrf
        @method('patch')

        <div class="col-md-6">
            <x-input-label for="name" :value="__('Nome')" class="form-label"/>
            <x-text-input id="name" name="name" type="text" class="form-control mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="text-danger mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="col-md-6">
            <x-input-label for="email" :value="__('Email')" class="form-label"/>
            <x-text-input id="email" name="email" type="email" class="form-control mt-1" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="text-danger mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-muted">
                        {{ __('Your email address is unverified.') }}
                        <button form="send-verification" class="btn btn-link p-0 text-decoration-underline">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-success">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-12 d-flex justify-content-end">
            <x-primary-button class="btn btn-success">
                {{ __('Atualizar') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ms-3 text-success">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
