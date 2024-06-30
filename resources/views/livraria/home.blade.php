@extends('livraria/master')

@section('content')
@include('livraria/banner')


	<!-- Categorias do mes -->
	<section class="container py-5">
		<div class="row text-center pt-3">
			<div class="col-lg-6 m-auto">
				<h1 class="h1">Categorias em Destaques</h1>
				<p>
					Explore os tesouros literários que selecionamos com carinho para você
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_01.png') }}" class="rounded-circle img-fluid border" /></a>
				<h5 class="text-center mt-3 mb-3">Tecnológia</h5>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_02.png') }}" class="rounded-circle img-fluid border" /></a>
				<h2 class="h5 text-center mt-3 mb-3">Ciência</h2>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_03.png') }}" class="rounded-circle img-fluid border" /></a>
				<h2 class="h5 text-center mt-3 mb-3">Matématica</h2>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
		</div>
	</section>
	<!-- Fim Categorias do mes -->

	<!-- Livros em destaque -->
	<section class="bg-light">
		<div class="container py-5">
			<div class="row text-center py-3">
				<div class="col-lg-6 m-auto">
					<h1 class="h1">Livros em Destaques</h1>
					<p>
						Descubra os livros que estão marcando época na nossa livraria online.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="">
							<img src="{{ asset('img/feature_prod_01.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								
								<li class="text-muted text-right">Aventura</li>
							</ul>
							<a href="" class="h2 text-decoration-none text-dark">Tomb Raider: Os Dez Mil Imortais</a>
							<p class="card-text">
								omb Raider – Os Dez Mil Imortais apresenta uma aventura inédita de Lara Croft, situada nos anos iniciais da trajetória da famosa arqueóloga aventureira.
							</p>
							
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="">
							<img src="{{ asset('img/feature_prod_02.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								
								<li class="text-muted text-right">Romance</li>
							</ul>
							<a href="" class="h2 text-decoration-none text-dark">A culpa é das estrelas</a>
							<p class="card-text">
								Hazel é uma paciente terminal. Ainda que, por um milagre da medicina, seu tumor tenha encolhido bastante ― o que lhe dá a promessa de viver mais alguns anos ―, o último capítulo de sua história foi escrito no momento do diagnóstico.
							</p>
							
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="">
							<img src="{{ asset('img/feature_prod_03.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								
								<li class="text-muted text-right">Ação</li>
							</ul>
							<a href="" class="h2 text-decoration-none text-dark">A Guerra dos Tronos</a>
							<p class="card-text">
								A guerra dos tronos é o primeiro livro da série best-seller internacional As Crônicas de Gelo e Fogo, que deu origem à adaptação de sucesso da HBO, Game of Thrones.
O verão pode durar décadas. O inverno, toda uma vida. E a guerra dos tronos começou. 
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Featured Product -->

@endsection