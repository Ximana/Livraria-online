@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Cadastrar Categoria</h4>
					@if(session('success'))
			        <div class="alert alert-success">
			            {{ session('success') }}
			        </div>
			    	@endif
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<!-- Formulário de Cadastro de Categoria -->
					<form action="{{ route('categorias.store') }}" method="post">
						@csrf <!-- Diretiva para incluir o token CSRF -->
						<div class="mb-3">
							<label for="categoria" class="form-label">Categoria</label>
							<input type="text" class="form-control" id="categoria" name="categoria" placeholder="Nome da Categoria" required>
						</div>
						<div class="mb-3">
							<label for="descricao" class="form-label">Descrição</label>
							<textarea class="form-control" id="descricao" name="descricao" rows="3" placeholder="Descrição da Categoria"></textarea>
						</div>
						<button type="submit" class="btn btn-primary">Cadastrar</button>
					</form>
				</div>
			</div>
		</div>
	</main>

	@endsection

