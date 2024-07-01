<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Autor;
use Illuminate\Http\JsonResponse;

class AutorController extends Controller
{
    /**
     * Retorna uma lista paginada de autores.
     */
    public function index()
    {
        $autores = Autor::get();

        return response()->json($autores, 200);
    }

    /**
     * Armazena um novo autor.e
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'profissao' => 'required|string|max:255',
            'biografia' => 'required|string',
        ]);

        $autor = Autor::create($request->all());

        return response()->json($autor, 201);
    }

    /**
     * Exibe os detalhes de um autor específico.
     *
     */
    public function show($id)
    {
        $autor = Autor::findOrFail($id);

        return response()->json($autor, 200);
    }

    /**
     * Atualiza os dados de um autor específico.
     *
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'profissao' => 'required|string|max:255',
            'biografia' => 'required|string',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->all());

        return response()->json($autor, 200);
    }

    /**
     * Remove um autor específico.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return response()->json(null, 204);
    }
}
