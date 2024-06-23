@extends('livraria/master')

@section('content')


	@if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

	<!-- INICIO CORPO -->
	<div class="container py-5">
		<div class="row">

			<div class="col-lg-3">
			
				<h1 class="h2 pb-4">Categorias</h1>
				<ul class="list-unstyled ">
					@foreach($categorias as $categoria)
						<li class="">
							<a style="color: black;" class=" d-flex justify-content-between text-decoration-none"
								href="{{ route('livros.categoria', $categoria) }}"> {{ $categoria->categoria }}
							</a>
						</li>
					@endforeach
					
					
				</ul>
			</div>

			<div class="col-lg-9">
				<div class="row">
					<div class="col-md-6">
						<ul class="list-inline shop-top-menu pb-3 pt-1">
							<li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3"
									href="#">Todos</a>
							</li>
							<li class="list-inline-item"><a class="h3 text-dark text-decoration-none mr-3"
									href="#">___</a>
							</li>
							<li class="list-inline-item"><a class="h3 text-dark text-decoration-none" href="#">____</a>
							</li>
						</ul>
					</div>
					<div class="col-md-6 pb-4">
						<div class="d-flex">
							<select class="form-control">
								<option>A à Z</option>
								<option>Destaques</option>
								<option>Preço</option>
							</select>
						</div>
					</div>
				</div>

				<!-- INICIO LISTA DE PRODUTOS  -->
				<div class="row">


				<h2>Resultados da Pesquisa</h2>

				@if($livros->isEmpty())
					<p>Nenhum livro encontrado.</p>
				@else
					<!-- INCIO CADA PRODUTO -->
					@foreach($livros as $livro)

					<div class="col-md-4">
						<div class="card mb-4 product-wap rounded-0">
							<div class="card rounded-0">
								@if($livro->imagem)
									<img class="card-img rounded-0 img-fluid" src="{{ asset('storage/' . $livro->imagem) }}" alt="{{ $livro->titulo }}">
								@else
									Sem Imagem
								@endif
								<div
									class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
									<ul class="list-unstyled">
										<li><a class="btn btn-success text-white" href=""><i
													class="far fa-heart"></i></a></li>
										<li><a class="btn btn-success text-white mt-2" href="{{ route('livros.show', $livro->id) }}"><i
													class="far fa-eye"></i></a></li>
										<li><a class="btn btn-success text-white mt-2" href=""><i
													class="fas fa-cart-plus"></i></a></li>
									</ul>
								</div>
							</div>
							<div class="card-body">
								<a href="{{ route('livros.show', $livro->id) }}" class="h3 text-decoration-none">{{ $livro->titulo }}</a>
								<ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
									<li>

									@foreach($livro->categorias as $categoria)
                            			{{ $categoria->categoria }}<br>
                        			@endforeach

									</li>
									<li class="pt-2"><span
											class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
										<span
											class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
										<span
											class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
										<span
											class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
										<span
											class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
									</li>
								</ul>
								<ul class="list-unstyled d-flex justify-content-center mb-1">
									<li><i class="text-warning fa fa-star"></i> <i class="text-warning fa fa-star"></i>
										<i class="text-warning fa fa-star"></i> <i class="text-muted fa fa-star"></i> <i
											class="text-muted fa fa-star"></i></li>
								</ul>
								<p class="text-center mb-0">{{ $livro->preco }}</p>
							</div>
						</div>
                    </div>

					@endforeach
					@endif
					<!-- FIM PRODUTO  -->




				</div>
				<!-- FIM LISTA DE PRODUTOS  -->

				<!-- INICIO PAGINACAO  -->
				<div class="row">
					<ul class="pagination pagination-lg justify-content-end">
						<li class="page-item disabled"><a
								class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#"
								tabindex="-1">1</a></li>
						<li class="page-item"><a
								class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark"
								href="#">2</a></li>
						<li class="page-item"><a
								class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark"
								href="#">3</a></li>
					</ul>
				</div>
				<!-- FIM PAGINACAO  -->
			</div>

		</div>
	</div>
	<!-- FIM CORPO DA PAGINA -->





@endsection
