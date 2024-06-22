@extends('admin/masterAdmin')

@section('content')

	<main class="mt-5 pt-3">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h4>Painel de Controle</h4>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3 mb-3">
					<div class="card bg-primary text-white h-100">
						<h1 class="card-body py-5">150</h1>
						<div class="card-footer d-flex">
							Total de Produtos <span class="ms-auto"> <i
								class="bi bi-chevron-right"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<div class="card bg-warning text-dark h-100">
						<h1 class="card-body py-5">100</h1>
						<div class="card-footer d-flex">
							Total de Clientes <span class="ms-auto"> <i
								class="bi bi-chevron-right"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<div class="card bg-success text-white h-100">
						<h1 class="card-body py-5">35</h1>
						<div class="card-footer d-flex">
							Vendas no ultimo mes <span class="ms-auto"> <i
								class="bi bi-chevron-right"></i>
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-3 mb-3">
					<div class="card bg-danger text-white h-100">
						<h1 class="card-body py-5">50000</h1>
						<div class="card-footer d-flex">
							Numero de visitas da semana <span class="ms-auto"> <i
								class="bi bi-chevron-right"></i>
							</span>
						</div>
					</div>
				</div>
			</div>



			<div class="row">
				<div class="col-md-12 mb-3">
				
				
				
				</div>
			</div>


		</div>
		</div>
	</main>

	@endsection