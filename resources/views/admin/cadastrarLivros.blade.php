@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Cadastrar Livros</h4>
				</div>
			</div>

			@if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <form action="" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" required>
                    </div>

                    <div class="form-group">
                        <label for="editora">Editora</label>
                        <input type="text" class="form-control" id="editora" name="editora" required>
                    </div>

                    <div class="form-group">
                        <label for="isbn">ISBN</label>
                        <input type="text" class="form-control" id="isbn" name="isbn" required>
                    </div>

                    <div class="form-group">
                        <label for="idioma">Idioma</label>
                        <input type="text" class="form-control" id="idioma" name="idioma" required>
                    </div>
                    <div class="form-group">
                        <label for="idioma">Categoria</label>
                        <input type="text" class="form-control" id="categoria" name="categoria" required>
                    </div>
                </div>
                
                <div class="col-md-6">
                    

                    <div class="form-group">
                        <label for="data_publicacao">Data de Publicação</label>
                        <input type="date" class="form-control" id="data_publicacao" name="data_publicacao" required>
                    </div>

                    <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="text" class="form-control" id="preco" name="preco" required>
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                    </div>

                    <div class="form-group">
                        <label for="quantidade">Autor</label>
                        <input type="number" class="form-control" id="autor" name="autor" required>
                    </div>

                    <div class="form-group">
                        <label for="imagem">Imagem</label>
                        <input type="file" class="form-control" id="imagem" name="imagem">
                    </div>

                </div>
                <div class="form-group">
                        <label for="resumo">Resumo</label>
                        <textarea class="form-control" id="resumo" name="resumo" rows="4" required></textarea>
                    </div>
            </div>

            <button type="submit" class="mt-1 btn btn-primary">Cadastrar Livro</button>
        </form>



		</div>
	</main>

	@endsection