<!DOCTYPE html>
<html lang="pt">

<head>
	<title>Livraria Camões</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}" />
	<link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/templatemo.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}" />

	<!-- Carregar as fonts e icones -->
	
	<link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
</head>

<body>
	<!-- Nav Topo -->
	<nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
		<div class="container text-light">
			<div class="w-100 d-flex justify-content-between">
				<div>
					<i class="fa fa-envelope mx-2"></i>
					<a class="navbar-sm-brand text-light text-decoration-none"
						href="mailto:info@company.com">livrariacamoes@gmail.com</a>
					<i class="fa fa-phone mx-2"></i>
					<a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">937-123-602</a>
				</div>
				<div>
					<a class="text-light" href="https://fb.com/templatemo" target="_blank" rel="sponsored"><i
							class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
					<a class="text-light" href="https://www.instagram.com/" target="_blank"><i
							class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
					<a class="text-light" href="https://twitter.com/" target="_blank"><i
							class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
					<a class="text-light" href="https://www.linkedin.com/" target="_blank"><i
							class="fab fa-linkedin fa-sm fa-fw"></i></a>
				</div>
			</div>
		</div>
	</nav>
	<!-- Fecha Nav topo -->

	<!-- Header -->
	<nav class="navbar navbar-expand-lg navbar-light shadow">
		<div class="container d-flex justify-content-between align-items-center">
			<a class="navbar-brand text-success logo h1 align-self-center" href="{{ route('home') }}">
			Livraria
			</a>

			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
				data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between"
				id="templatemo_main_nav">
				<div class="flex-fill">
					<ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
						<li class="nav-item">
							<a class="nav-link" href="{{ route('home') }}">Inicio</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('sobre') }}">Sobre</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="{{ route('livros.index') }}">Livros</a></li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contato') }}">Contacto</a>
						</li>

						<!--- Verificar se o usuario esta logado e mostrar o nome    -->
						@if(auth() -> check())
							<li class="nav-item">
								<a class="nav-link" href="{{ route('favoritos.index') }}">Favoritos</a>
							</li>
						@endif
					</ul>
				</div>
				<div class="navbar align-self-center d-flex">
					<div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
						<div class="input-group">
							<input type="text" class="form-control" id="inputMobileSearch" placeholder="Pesquisa ..." />
							<div class="input-group-text">
								<i class="fa fa-fw fa-search"></i>
							</div>
						</div>
					</div>
					<a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal"
						data-bs-target="#templatemo_search">
						<i class="fa fa-fw fa-search text-dark mr-2"></i>
					</a>

					<!--- Verificar se o usuario esta logado e mostrar o nome    -->
					@if(auth() -> check())
						<a class="nav-icon position-relative text-decoration-none"
							href="{{ route('carrinho.index') }}">
							<i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
							<span
								class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">
								50
							</span>
						</a>
					@endif


					<div class="nav-icon position-relative text-decoration-none dropdown" href="#">
						<a class="fa fa-fw fa-user text-dark mr-3 dropdown-toggle btn" role="button"
							id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">

							<!--- Verificar se o usuario esta logado e mostar o nome do usuario    -->
							@if(auth() -> check())
								{{ auth() -> user() -> name }}
							@endif

						</a>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

							<!--- Verificar se o usuario esta logado    -->
							@if(auth() -> check())
								<li>
<x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            Perfil
                        </x-dropdown-link>
								</li>
								<li>
									<form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Sair
                            </x-dropdown-link>
                        </form>
								</li>
							@else
							<!-- Se nao estiver logado  -->
							<li>
								<a class="dropdown-item" href="{{ route('register') }}">Criar conta</a>
							</li>
							<li>
								<a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
							@endif

						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- Fecha Header -->

	<!-- Modal -->
	<div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="w-100 pt-1 mb-5 text-right">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="{{ route('livros.pesquisar') }}" method="GET" class="modal-content modal-body border-0 p-0">

			<div>
            <label for="titulo">Título</label>
            <input class="form-control" type="text" name="titulo" id="titulo" value="{{ request('titulo') }}">
        </div>
        <div>
            <label for="autor">Autor</label>
            <input class="form-control" type="text" name="autor" id="autor" value="{{ request('autor') }}">
        </div>
        <div>
            <label for="isbn">ISBN</label>
            <input class="form-control" type="text" name="isbn" id="isbn" value="{{ request('isbn') }}">
        </div>





				<div class="input-group mb-2 mt-2">
					<!--<input type="text" class="form-control" value="{{ request('titulo') }}" id="pesquisa" name="pesquisa" placeholder="Pesquisa ..." /> -->
					<button type="submit" class="input-group-text bg-success text-light form-control">
						Pesquisar<i class="fa fa-fw fa-search text-white"></i>
					</button>
				</div>
			</form>
		</div>
	</div>





    @yield('content')

    @include('livraria/rodape')



	<!-- Inicio Script -->
	<script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
	<script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
	<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('js/templatemo.js') }}"></script>
	<script src="{{ asset('js/custom.js') }}"></script>
	<!-- Fim Script -->
</body>

</html>
