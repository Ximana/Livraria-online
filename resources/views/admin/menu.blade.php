<!--  INICIO NAV DO TOPO -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button"
				data-bs-toggle="offcanvas" data-bs-target="#sidebar"
				aria-controls="offcanvasExample">
				<span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
			</button>
			<a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
				href="{{ route('dashboard') }}">Livraria XM</a>
			<button class="navbar-toggler" type="button"
				data-bs-toggle="collapse" data-bs-target="#topNavBar"
				aria-controls="topNavBar" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="topNavBar">
				<form class="d-flex ms-auto my-3 my-lg-0">
					<div class="input-group">
						<input class="form-control" type="search"
							placeholder="Insira a sua pesquisa" aria-label="Search" />
						<button class="btn btn-primary" type="submit">
							<i class="fa fa-search"></i> Pesquisar
						</button>
					</div>
				</form>
				<ul class="navbar-nav">
					<li class="nav-item dropdown"><a
						class="nav-link dropdown-toggle ms-2" href="#" role="button"
						data-bs-toggle="dropdown" aria-expanded="false"> <i
							class="fa fa-user"></i>
					</a>
						<ul class="dropdown-menu dropdown-menu-end">
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
							<li><a class="dropdown-item" href="#">__</a></li>
							<li><a class="dropdown-item" href="#"> __</a></li>
						</ul></li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- FIM NAV DO TOPO -->
	
	
	<!-- INICIO MENU LATERAL -->
	<div class="offcanvas offcanvas-start sidebar-nav bg-dark"
		tabindex="-1" id="sidebar">
		<div class="offcanvas-body p-0">
			<nav class="navbar-dark">
				<ul class="navbar-nav">
					<li>
						<div class="text-muted small fw-bold text-uppercase px-3">
							Principal</div>
					</li>
					<li><a href="{{ route('home') }}" target="_blank"
						class="nav-link px-3 active"> <span class="me-2"><i
								class="fa fa-store"></i></span> <span>Acessar Livraria</span>
					</a></li>
					<li class="my-4"><hr class="dropdown-divider bg-light" /></li>
					<li>
						<div class="text-muted small fw-bold text-uppercase px-3 mb-3">
							Gerenciar</div>
					</li>

					<li><a class="nav-link px-3 sidebar-link"
						data-bs-toggle="collapse" href="#layouts"> <span class="me-2"><i
								class="fa fa-book"></i></span> <span>Livros</span> <span
							class="ms-auto"> <span class="right-icon"> <i
									class="fa fa-chevron-down"></i>
							</span>
						</span>
					</a>
						<div class="collapse" id="layouts">
							<ul class="navbar-nav ps-3">
								<li><a href="{{ route('livros.indexAdmin') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-search"></i></span> <span>Listar Livros</span>
								</a></li>
								<li><a href="{{ route('autores.index') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-search"></i></span> <span>Listar Autores</span>
								</a></li>
								<li><a href="{{ route('categorias.index') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-search"></i></span> <span>Listar Categorias</span>
								</a></li>
								<li><a href="{{ route('livros.create') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-plus-circle"></i></span> <span>Adicionar Livro</span>
								</a></li>
								<li><a href="{{ route('autores.create') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-plus-circle"></i></span> <span>Adicionar Autor</span>
								</a></li>
								<li><a href="{{ route('categorias.create') }}" class="nav-link px-3"> <span
										class="me-2"><i class="fa fa-plus-circle"></i></span> <span>Adicionar Categoria</span>
								</a></li>
							</ul>
						</div>
					</li>

					<li><a href="clientes.html" class="nav-link px-3"> <span
							class="me-2"><i class="fa fa-users"></i></span> <span>Clientes</span>
					</a></li>
					<li class="my-4"><hr class="dropdown-divider bg-light" /></li>
					<li>
						<div class="text-muted small fw-bold text-uppercase px-3 mb-3">
							Relatorio</div>
					</li>
					<li><a href="{{ route('pedidos.pendentes') }}" class="nav-link px-3"> <span class="me-2"><i
								class="fa fa-archive"></i></span> <span>Pedidos Pendentes</span>
					</a></li>
					<li><a href="{{ route('pedidos.concluidos') }}" class="nav-link px-3"> <span class="me-2"><i
								class="fa fa-archive"></i></span> <span>Pedidos Concluidos</span>
					</a></li>
					<li><a href="" class="nav-link px-3"> <span class="me-2"><i
								class="fa fa-list-alt"></i></span> <span>Relatorio</span>
					</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- Fim Menu Lateral -->