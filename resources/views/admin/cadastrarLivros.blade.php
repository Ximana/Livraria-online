@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Cadastrar Livros</h4>
				</div>
			</div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form class="row" action="{{ route('livros.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo') }}" required>
            </div>

            <div class="form-group">
                <label for="editora">Editora</label>
                <input type="text" class="form-control" id="editora" name="editora" value="{{ old('editora') }}">
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{ old('isbn') }}">
            </div>

            <div class="form-group">
                <label for="idioma">Idioma</label>
                <input type="text" class="form-control" id="idioma" name="idioma" value="{{ old('idioma') }}" required>
            </div>
            <div class="form-group">
                <label for="autores">Autores</label>
                <select multiple class="form-control" id="autores" name="autores[]" required>
                    @foreach($autores as $autor)
                        <option value="{{ $autor->id }}">{{ $autor->nome }}</option>
                    @endforeach
                </select>
            </div>
            </div>

            <div class="col-md-6">
                
            

            <div class="form-group">
                <label for="data_publicacao">Data de Publicação</label>
                <input type="date" class="form-control" id="data_publicacao" name="data_publicacao" value="{{ old('data_publicacao') }}">
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco" value="{{ old('preco') }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="quantidade">Quantidade</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" value="{{ old('quantidade') }}" required>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" class="form-control" id="imagem" name="imagem">
            </div>

            

            <div class="form-group">
                <label for="categorias">Categorias</label>
                <select multiple class="form-control" id="categorias" name="categorias[]" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                    @endforeach
                </select>
            </div>

            </div>
            <div class="form-group">
                <label for="resumo">Resumo</label>
                <textarea class="form-control" id="resumo" name="resumo" rows="3" required>{{ old('resumo') }}</textarea>
            </div>

<div>
    <button type="submit" class="mt-1 btn btn-primary">Salvar</button>
</div>
            
        </form>


		</div>
	</main>

	@endsection