<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivroController extends Controller
{
    public function index(){

        return view('livraria.livros');
    }

    public function indexAdmin(){

        return view('admin.listarLivros');
    }

    public function create(){

        return view('admin.cadastrarLivros');
    }

}
