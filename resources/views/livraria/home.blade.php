@extends('livraria/master')

@section('content')
@include('livraria/banner')


	<!-- Categorias do mes -->
	<section class="container py-5">
		<div class="row text-center pt-3">
			<div class="col-lg-6 m-auto">
				<h1 class="h1">Categorias em Destaques</h1>
				<p>
					Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
					officia deserunt mollit anim id est laborum.
				</p>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_01.jpg') }}" class="rounded-circle img-fluid border" /></a>
				<h5 class="text-center mt-3 mb-3">Ciência</h5>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_02.jpg') }}" class="rounded-circle img-fluid border" /></a>
				<h2 class="h5 text-center mt-3 mb-3">Tecnologia</h2>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
			<div class="col-12 col-md-4 p-5 mt-3">
				<a href="#"><img src="{{ asset('img/category_img_03.jpg') }}" class="rounded-circle img-fluid border" /></a>
				<h2 class="h5 text-center mt-3 mb-3">Desporto</h2>
				<p class="text-center">
					<a class="btn btn-success">Consultar</a>
				</p>
			</div>
		</div>
	</section>
	<!-- End Categories of The Month -->

	<!-- Start Featured Product -->
	<section class="bg-light">
		<div class="container py-5">
			<div class="row text-center py-3">
				<div class="col-lg-6 m-auto">
					<h1 class="h1">Livros em Destaques</h1>
					<p>
						Reprehenderit in voluptate velit esse cillum dolore eu fugiat
						nulla pariatur. Excepteur sint occaecat cupidatat non proident.
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="shop-single.html">
							<img src="{{ asset('img/feature_prod_01.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								<li>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-muted fa fa-star"></i>
									<i class="text-muted fa fa-star"></i>
								</li>
								<li class="text-muted text-right">Computação</li>
							</ul>
							<a href="shop-single.html" class="h2 text-decoration-none text-dark">Introdução a Machine Learning com TensorFlow</a>
							<p class="card-text">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt
								in culpa qui officia deserunt.
							</p>
							<p class="text-muted">Visitas (24)</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="shop-single.html">
							<img src="{{ asset('img/feature_prod_02.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								<li>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-muted fa fa-star"></i>
									<i class="text-muted fa fa-star"></i>
								</li>
								<li class="text-muted text-right">Romance</li>
							</ul>
							<a href="shop-single.html" class="h2 text-decoration-none text-dark">A culpa é das estrelas</a>
							<p class="card-text">
								Aenean gravida dignissim finibus. Nullam ipsum diam, posuere
								vitae pharetra sed, commodo ullamcorper.
							</p>
							<p class="text-muted">Visitas (48)</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-4 mb-4">
					<div class="card h-100">
						<a href="shop-single.html">
							<img src="{{ asset('img/feature_prod_03.jpg') }}" class="card-img-top" alt="..." />
						</a>
						<div class="card-body">
							<ul class="list-unstyled d-flex justify-content-between">
								<li>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
									<i class="text-warning fa fa-star"></i>
								</li>
								<li class="text-muted text-right">Aventura</li>
							</ul>
							<a href="shop-single.html" class="h2 text-decoration-none text-dark">A Guerra dos Tronos</a>
							<p class="card-text">
								Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar
								sagittis diam, et scelerisque ipsum lobortis nec.
							</p>
							<p class="text-muted">Visitas (74)</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Featured Product -->

@endsection