@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			</h1><h1>Editar Autor</h1>

        <form action="{{ route('autores.atualizar', ['id' => $autor->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $autor->nome }}">
            </div>

            <div class="form-group">
                <label for="profissao">Profissão</label>
                <input type="text" class="form-control" id="profissao" name="profissao" value="{{ $autor->profissao }}">
            </div>

            <div class="form-group">
                <label for="biografia">Biografia</label>
                <textarea class="form-control" id="biografia" name="biografia" rows="5">{{ $autor->biografia }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
		</div>
	</main>

	@endsection

