@extends('livraria/master')

@section('content')



<!-- produto -->
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

                        <h5>Autor(a):</h5>
                        <ul>
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

                        <div class="mt-5">
                            <form method="post" action="{{ route('carrinho.adicionar', $livro->id) }}" class="mb-3">
                                @csrf
                                <input type="hidden" name="quantidade" id="product-quanity" value="1" min="1" max="{{ $livro->quantidade }}">

                                <div class="row">
                                    <!-- campo Quantidade -->
                                    <div class="col-auto">
                                        <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-right">Quantidade</li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-minus">-</span></li>
                                            <li class="list-inline-item"><span class="badge bg-secondary" id="var-value">1</span></li>
                                            <li class="list-inline-item"><span class="btn btn-success" id="btn-plus">+</span></li>
                                        </ul>
                                    </div>
                                    <!--Fim campo Quantidade-->

                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success btn-lg w-100">
                                            <i class="fas fa-cart-plus"></i> Adicionar ao Carrinho
                                        </button>
                                    </div>
                                    <div class="col-12 mt-1 mt-md-0">
                                        <form action="{{ route('favoritos.adicionar', $livro->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-lg w-100">
                                                <i class="far fa-heart"></i> Adicionar aos favoritos
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- produto -->


@endsection
