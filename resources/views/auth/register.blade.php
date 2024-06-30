@extends('livraria.master')

@section('content')

<div class="container-fluid bg-light py-5">
    <div class="col-md-6 m-auto text-center">
        <h1 class="h1">Registar</h1>
        <p>
            Preencha o formulário abaixo para criar sua conta.
        </p>
    </div>
</div>

<!-- Formulário de Registro -->
<div class="container py-5">
    <div class="row py-5">
        <div class="col-md-9 m-auto">
            <form method="POST" action="{{ route('register') }}" role="form">
                @csrf

                <div class="row">
                    <!-- Nome -->
                    <div class="col-md-6 mb-3">
                        <label for="name" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Seu Nome">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email -->
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="Seu Email">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Nacionalidade -->
                    <div class="col-md-6 mb-3">
                        <label for="nacionalidade" class="form-label">Nacionalidade</label>
                        <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" value="{{ old('nacionalidade') }}" placeholder="Sua Nacionalidade">
                        <x-input-error :messages="$errors->get('nacionalidade')" class="mt-2" />
                    </div>

                    <!-- Profissão -->
                    <div class="col-md-6 mb-3">
                        <label for="profissao" class="form-label">Profissão</label>
                        <input type="text" class="form-control" id="profissao" name="profissao" value="{{ old('profissao') }}" placeholder="Sua Profissão">
                        <x-input-error :messages="$errors->get('profissao')" class="mt-2" />
                    </div>

                    <!-- Número do BI -->
                    <div class="col-md-6 mb-3">
                        <label for="numero_bi" class="form-label">Número do BI</label>
                        <input type="text" class="form-control" id="numero_bi" name="numero_bi" value="{{ old('numero_bi') }}" placeholder="Seu Número do BI">
                        <x-input-error :messages="$errors->get('numero_bi')" class="mt-2" />
                    </div>

                    <!-- Morada -->
                    <div class="col-md-6 mb-3">
                        <label for="morada" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="morada" name="morada" value="{{ old('morada') }}" placeholder="Sua Morada">
                        <x-input-error :messages="$errors->get('morada')" class="mt-2" />
                    </div>

                    <!-- Telefone -->
                    <div class="col-md-6 mb-3">
                        <label for="telefone" class="form-label">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" value="{{ old('telefone') }}" placeholder="Seu Telefone">
                        <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="col-md-6 mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password" placeholder="Senha">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6 mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmar Senha">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <!-- Botão de Registro -->
                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-success">Registar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
