<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Livro;
use Illuminate\Support\Facades\Validator;

class LivroController extends Controller
{
    public function index()
    {
        $livros = Livro::with('autores', 'categorias')->get();

        return response()->json($livros, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'editora' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'idioma' => 'required|string|max:255',
            'resumo' => 'required|string',
            'data_publicacao' => 'nullable|date',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'autores' => 'required|array',
            'categorias' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $livro = Livro::create($request->all());
        $livro->autores()->attach($request->autores);
        $livro->categorias()->attach($request->categorias);

        return response()->json($livro, 201);
    }

    public function show($id)
    {
        $livro = Livro::with(['autores', 'categorias'])->findOrFail($id);
        return response()->json($livro);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'editora' => 'nullable|string|max:255',
            'isbn' => 'nullable|string|max:255',
            'idioma' => 'required|string|max:255',
            'resumo' => 'required|string',
            'data_publicacao' => 'nullable|date',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'autores' => 'required|array',
            'categorias' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $livro = Livro::findOrFail($id);
        $livro->update($request->all());
        $livro->autores()->sync($request->autores);
        $livro->categorias()->sync($request->categorias);

        return response()->json($livro, 200);
    }

    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();

        return response()->json(['message' => 'Livro deletado com sucesso'], 204);
    }

    public function livrosPorCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        $livros = $categoria->livros()->with('autores')->get();

        return response()->json($livros);
    }

    public function pesquisar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pesquisa' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $query = Livro::query();

        $termoPesquisa = $request->pesquisa;
        $query->where(function ($query) use ($termoPesquisa) {
            $query->where('titulo', 'like', '%' . $termoPesquisa . '%')
                ->orWhere('isbn', 'like', '%' . $termoPesquisa . '%')
                ->orWhereHas('autores', function ($q) use ($termoPesquisa) {
                    $q->where('nome', 'like', '%' . $termoPesquisa . '%');
                });
        });

        $livros = $query->with(['categorias', 'autores'])->get();

        return response()->json($livros);
    }
}
