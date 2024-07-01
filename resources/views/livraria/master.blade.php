<!DOCTYPE html>
<html lang="pt">

<head>
    <title>Livraria Camões</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="apple-touch-icon" href="{{ asset('img/apple-icon.png') }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('img/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/templatemo.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
</head>

<body>
    <!-- Navbar Topo -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">livrariaximanas@gmail.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">937-123-602</a>
                </div>
                <div>
                    <a class="text-light" href="https://https://www.facebook.com/PauloPajox/" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://twitter.com/" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Fechar Navbar Topo -->

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container">
            <a class="navbar-brand text-success logo h1" href="{{ route('home') }}"><img src="{{ asset('img/logo_verde.png') }}" style="width: 150px;"></a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav"
                aria-controls="templatemo_main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse flex-fill" id="templatemo_main_nav">
                <ul class="nav navbar-nav d-flex justify-content-end mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('sobre') }}">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('livros.index') }}">Livros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                    </li>

                    <!-- Verificar se o usuário está logado e mostrar o nome -->
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('favoritos.index') }}">Favoritos</a>
                        </li>
                    @endauth
                </ul>

                <form class="d-lg-flex ml-auto my-2 my-lg-0" action="{{ route('livros.pesquisar') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" name="pesquisa" placeholder="Pesquisar ..." />
                        <div class="input-group-text">
                            <button type="submit" class=" border-0 fa fa-fw fa-search"></button>
                            
                        </div>
                    </div>
                </form>

                <ul class="nav navbar-nav d-lg-flex align-items-center mt-1 mt-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('carrinho.index') }}">
                                <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                                <!-- <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">50</span> -->
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('pedidos.index') }}">Meus Pedidos</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Perfil</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Criar conta</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- Fechar Header -->

    @include('livraria/mensagens')

    
    @yield('content')

    <!-- Rodapé -->
    @include('livraria/rodape')

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/templatemo.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Fechar Scripts -->
</body>

</html>
