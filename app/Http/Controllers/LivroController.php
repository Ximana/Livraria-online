<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Livro;


class LivroController extends Controller
{
    
     public function index()
    {
         $livros = Livro::with('autores', 'categorias')->paginate(1);
        $categorias = Categoria::all();
        return view('livraria.livros', compact('livros', 'categorias'));

        

    }

    public function indexAdmin(){

        $livros = Livro::with('autores', 'categorias')
                       ->paginate(10);

        return view('admin.listarLivros', ['livros' => $livros]);
    }

    public function create(){

        $autores = Autor::all();
        $categorias = Categoria::all();
        return view('admin.cadastrarLivros', compact('autores', 'categorias'));
        //return view('admin.cadastrarLivros');
    }

     public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'editora' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'idioma' => 'required|string|max:255',
            'resumo' => 'required|string',
            'data_publicacao' => 'nullable|date',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'imagem' => 'nullable|image|max:2048',
            'autores' => 'required|array',
            'categorias' => 'required|array',
        ]);

        $imagemPath = null;
        if ($request->hasFile('imagem')) {
            $imagemPath = $request->file('imagem')->store('imagens', 'public');
        }

        $livro = Livro::create([
            'titulo' => $request->titulo,
            'editora' => $request->editora,
            'isbn' => $request->isbn,
            'idioma' => $request->idioma,
            'resumo' => $request->resumo,
            'data_publicacao' => $request->data_publicacao,
            'preco' => $request->preco,
            'quantidade' => $request->quantidade,
            'imagem' => $imagemPath,
        ]);

        $livro->autores()->attach($request->autores);
        $livro->categorias()->attach($request->categorias);

        return redirect()->route('livros.create')->with('success', 'Livro inserido com sucesso');
    }

      public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        return view('admin.editarLivro', compact('livro'));
    }

    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);
        $livro->update($request->all());
        return redirect()->route('livros.indexAdmin')->with('success', 'Livro atualizado com sucesso');
    }
  
    public function show($id)
    {
        $livro = Livro::with(['autores', 'categorias'])->findOrFail($id);
        return view('admin.detalheLivro', compact('livro'));
    } 

    public function livroDetalhe($id)
{
    $livro = Livro::with(['autores', 'categorias'])->findOrFail($id);
    return view('livraria.detalheLivro', compact('livro'));
}

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect()->route('livros.indexAdmin')->with('success', 'Livro removido com sucesso');
    }

   public function livrosPorCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $livros = $categoria->livros()->with('autores')->paginate(10);
        $categorias = Categoria::all();
        return view('livraria.livros', compact('livros', 'categorias'));
    }

     public function pesquisar(Request $request)
    {
        $query = Livro::query();

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->titulo . '%');
        }

        if ($request->filled('autor')) {
            $query->whereHas('autores', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->autor . '%');
            });
        }

        if ($request->filled('isbn')) {
            $query->where('isbn', 'like', '%' . $request->isbn . '%');
        }


        //$livros = $query->with('autores', 'categorias')->paginate(10);
        //return view('resultados.pesquisa', compact('livros'));

        $livros = $query->with(['categorias', 'autores'])->paginate(10);
        $categorias = Categoria::all();

        return view('livraria.livros', compact('livros', 'categorias'));
    }

    public function pesquisarAAAAA(Request $request)
    {
        $query = Livro::query();

        if ($request->filled('titulo')) {
            $query->where('titulo', 'like', '%' . $request->input('titulo') . '%');
        }

        if ($request->filled('isbn')) {
            $query->where('isbn', 'like', '%' . $request->input('isbn') . '%');
        }

        if ($request->filled('autor')) {
            $query->whereHas('autores', function ($q) use ($request) {
                $q->where('nome', 'like', '%' . $request->input('autor') . '%');
            });
        }

        $livros = $query->with(['categorias', 'autores'])->get();
        $categorias = Categoria::all();

        return view('livraria.livros', compact('livros', 'categorias'));
    }


        
}