@extends('livraria/master')

@section('content')

 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Meus Livros Favoritos</div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Imagem</th>
                                        <th>Título</th>
                                        <th>Autores</th>
                                        <th>Categorias</th>
                                        <th>Editora</th>
                                        <th>Idioma</th>
                                        <th>Resumo</th>
                                        <th>Preço</th>
                                        <th>Ação</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($favoritos as $favorito)
                                        <tr>
                                            <td>
                                                @if ($favorito->livro->imagem)
                                                    <img src="{{ asset('storage/' . $favorito->livro->imagem) }}" alt="Imagem do livro {{ $favorito->livro->titulo }}" class="img-fluid" style="max-width: 100px;">
                                                @else
                                                    Sem imagem
                                                @endif
                                            </td>
                                            <td>{{ $favorito->livro->titulo }}</td>
                                            <td>
                                                @foreach ($favorito->livro->autores as $autor)
                                                    {{ $autor->nome }}@if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($favorito->livro->categorias as $categoria)
                                                    {{ $categoria->categoria }}@if (!$loop->last), @endif
                                                @endforeach
                                            </td>
                                            <td>{{ $favorito->livro->editora }}</td>
                                            <td>{{ $favorito->livro->idioma }}</td>
                                            <td>{{ $favorito->livro->resumo }}</td>
                                            <td>{{ $favorito->livro->preco }}</td>
                                            <td>
                                                <form action="{{ route('favoritos.remover', $favorito->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="fa fa-trash btn btn-danger btn-sm"></button>
                                                </form>
                                                <a class="far fa-eye btn btn-success btn-sm" href="{{ route('livro.livroDetalhe', $favorito->livro->id) }}"></a>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $favoritos->links() }} <!-- Paginação -->
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection