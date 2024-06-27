@extends('livraria/master')

@section('content')


<!--  produto -->
<section class="bg-light">
		<div class="container pb-5">
			<div class="row">
				<div class="col-lg-5 mt-5">
					<div class="card mb-3">
						@if($livro->imagem)
						<img class="card-img img-fluid" src="{{ Storage::url($livro->imagem) }}" alt="Imagem do Livro" id="product-detail">
        		@endif

					</div>
					<div class="row">
					</div>
				</div>
				<!-- col end -->


				<div class="col-lg-7 mt-5">
					<div class="card">
						<div class="card-body">
							<h1 class="h2">
								{{ $livro->titulo }}

							</h1>
							<p class="h3 py-2">
								{{ $livro->preco }} kz
							</p>
							<!--
							<p class="py-2">
								<i class="fa fa-star text-warning"></i> <i
									class="fa fa-star text-warning"></i> <i
									class="fa fa-star text-warning"></i> <i
									class="fa fa-star text-warning"></i> <i
									class="fa fa-star text-secondary"></i> <span
									class="list-inline-item text-dark">Avaliação 4.8</span>
							</p>
						-->

							<h5>Autor(a):</h5>

							<ul class="">
				        @foreach($livro->autores as $autor)
				            <li>{{ $autor->nome }} ({{ $autor->pivot->descricao }})</li>
				        @endforeach
    					</ul>

							<h5>Categorias</h5>
				    <ul>
				        @foreach($livro->categorias as $categoria)
				            <li>{{ $categoria->categoria }}</li>
				        @endforeach
				    </ul>




							<h5>Data de Publicação</h5>
							<ul>
							<li> {{ $livro->data_publicacao }}</li>
						</ul>

							<h5>Resumo</h5>
							<div>
									{{ $livro->resumo }}
							</div>
							<!--
							<ul class="list-inline">
								<li class="list-inline-item">
									<h6>Cores disponivéis :</h6>
								</li>
								<li class="list-inline-item">
									<p class="text-muted">
										<strong>Branca / Preta</strong>
									</p>
								</li>
							</ul>
						-->

<!--
							<h6></h6>
							<ul class="list-unstyled pb-3">
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
								<li></li>
							</ul>
						-->

							<div  class="mt-5">
								@csrf
								<div class="row">
									
									<!--
									<div class="col-auto">
										Botao Quantidade
										<ul class="list-inline pb-3">
											<li class="list-inline-item text-right">Quantidade
											<input type="hidden" name="quantidade" id="product-quanity"
												value="1" min="1" max="{{ $livro->quantidade }}>
											</li>
											<li class="list-inline-item"><span
												class="btn btn-success" id="btn-minus">-</span></li>
											<li class="list-inline-item"><span
												class="badge bg-secondary" id="var-value">1</span></li>
											<li class="list-inline-item"><span
												class="btn btn-success" id="btn-plus">+</span></li>
										</ul>
									</div>
								-->
								</div>
								<div class="row pb-3">

									<div class="col d-grid">

									<input type="hidden" name="idUsuario" value="" >
									<input type="hidden" name="idProduto" value="">

									

									<div class="row ">
    <div class="col-md-6 ">
        <form action="{{ route('favoritos.adicionar', $livro->id) }}" method="POST" class="">
            @csrf
            <button type="submit" class="form-control btn btn-success btn-lg">
                <i class="far fa-heart"></i> Adicionar aos favoritos
            </button>
        </form>
    </div>

    <div class="col-md-6">
        <form action="{{ route('carrinho.adicionar', $livro->id) }}" method="POST" class="d-flex align-items-center">
    @csrf
    <input type="number" name="quantidade" class="form-control mr-2" value="1" min="1" max="{{ $livro->quantidade }}">
    <button type="submit" class="btn btn-success btn-lg">
        <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
    </button>
</form>
    </div>
</div>




									</div>
								</div>
								<input type="hidden" name="livro_id" value="{{ $livro->id }}">
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- produto -->




@endsection
