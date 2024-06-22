<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
     public function index(){

        //return view('admin.listarCategoria');
        $categorias = Categoria::paginate(10);
        return view('admin.listarCategoria', compact('categorias'));
    }

    public function create(){

        return view('admin.cadastrarCategoria');
    }

    public function store(Request $request)
    {
        //return "Ola mundo";
        $request->validate([
            'categoria' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        Categoria::create([
            'categoria' => $request->categoria,
            'descricao' => $request->descricao,
        ]);

        return redirect()->route('categorias.create')->with('success', 'Categoria cadastrada com sucesso!');
    }

    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.editarCategoria', compact('categoria'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'categoria' => 'required|string|max:255',
            'descricao' => 'nullable|string|max:255',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria removida com sucesso.');
    }

}
