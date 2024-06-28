<section class="space-y-6">
    <header class="mb-4">
        <h2 class="h3 text-danger">
            {{ __('Apagar Conta') }}
        </h2>
        <p class="text-muted">Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Antes de excluir sua conta, baixe todos os dados ou informações que deseja reter.
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="btn btn-danger"
    >{{ __('Apagar Conta') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4">
            @csrf
            @method('delete')

            <h2 class="h5 text-danger">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-muted">
                {{ __('Depois que sua conta for excluída, todos os seus recursos e dados serão excluídos permanentemente. Digite sua senha para confirmar que deseja excluir permanentemente sua conta.') }}
            </p>

            <div class="my-3">
                <x-input-label for="password" value="{{ __('Password') }}" class="form-label sr-only" />
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control"
                    placeholder="{{ __('Password') }}"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-danger mt-2" />
            </div>

            <div class="d-flex justify-content-end">
                <x-secondary-button x-on:click="$dispatch('close')" class="btn btn-secondary me-3">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-danger-button class="btn btn-danger">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
