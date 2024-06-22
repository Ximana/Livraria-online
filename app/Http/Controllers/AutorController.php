<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autor;

class AutorController extends Controller
{
    public function index(){

        //return view('admin.listarAutor');
        $autores = Autor::paginate(10); // Paginação com 10 autores por página

        return view('admin.listarAutor', ['autores' => $autores]);
    }

    public function create(){

        return view('admin.cadastrarAutor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'profissao' => 'required|string|max:255',
            'biografia' => 'required|string',
        ]);

        Autor::create($request->all());

        return redirect()->route('autores.create')->with('success', 'Autor cadastrado com sucesso.');
    }
     public function editarAutor($id)
    {
        $autor = Autor::findOrFail($id);

        return view('admin.editarAutor', ['autor' => $autor]);
    }

    public function atualizarAutor(Request $request, $id)
    {
        $autor = Autor::findOrFail($id);

        $autor->nome = $request->input('nome');
        $autor->profissao = $request->input('profissao');
        $autor->biografia = $request->input('biografia');

        $autor->save();

        return redirect()->route('autores.index')->with('success', 'Autor atualizado com sucesso!');
    }

    public function removerAutor($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return redirect()->route('autores.index')->with('success', 'Autor removido com sucesso!');
    }
}
