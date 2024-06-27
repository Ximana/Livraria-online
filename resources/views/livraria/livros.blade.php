@extends('livraria/master')

@section('content')

             

    <!-- INICIO CORPO -->
    <div class="container py-5">
        <div class="row">

            <div class="col-lg-3">
            
                <h1 class="h2 pb-4">Categorias</h1>
                <ul class="list-unstyled ">
                        

                         @foreach ($categorias as $categoria)
                            <li class=" nav-link">
                                <a href="{{ route('livros.categoria', $categoria->id) }}" style="color: black;" class=" d-flex justify-content-between text-decoration-none">{{ $categoria->categoria }}</a>
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



                    <!-- INCIO CADA PRODUTO -->
                    @foreach ($livros as $livro)

                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                
                                @if ($livro->imagem)
                            <img src="{{ asset('storage/' . $livro->imagem) }}" class="card-img rounded-0 img-fluid" alt="Imagem do livro {{ $livro->titulo }}">
                        @else
                            Sem imagem
                        @endif
                                    
                               
                   
                                <div
                                    class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">


                                        <li>



                                                    <form action="{{ route('favoritos.adicionar', $livro->id) }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-success text-white"><i
                                                    class="far fa-heart"></i></button>
</form>

                                        </li>


                                        <li><a class="btn btn-success text-white mt-2" href="{{ route('livro.livroDetalhe', $livro->id) }}"><i
                                                    class="far fa-eye"></i></a></li>
                                        <li>




<form action="{{ route('carrinho.adicionar', $livro->id) }}" method="POST" class="mt-1">
    @csrf
    <button type="submit" class="btn btn-success text-white""><i
                                                    class="fas fa-cart-plus"></i></button>
</form>


                                                </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body">

                                <a href="{{ route('livro.livroDetalhe', $livro->id) }}" class="h3 text-decoration-none">{{ $livro->titulo }}</a>





                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                    <li>

                                    @foreach ($livro->categorias as $categoria)
                                        {{ $categoria->categoria }}|
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
                    <!-- FIM PRODUTO  -->


                    

                </div>
                <!-- FIM LISTA DE PRODUTOS  -->

                {{ $livros->links() }} <!-- Links de paginação -->

                <!-- INICIO PAGINACAO  
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
                 FIM PAGINACAO  -->
            </div>

        </div>
    </div>
    <!-- FIM CORPO DA PAGINA -->



@endsection