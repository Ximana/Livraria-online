@extends('livraria.master')

@section('content')
<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">{{ __('Perfil de Usuario') }}</h1>
        <p>
            Visualize e edite suas informações pessoais.
        </p>
    </div>
</div>

<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <div class="bg-white p-4 sm:p-8 shadow sm:rounded-lg mb-4">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="bg-white p-4 sm:p-8 shadow sm:rounded-lg mb-4">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="bg-white p-4 sm:p-8 shadow sm:rounded-lg mb-4">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
