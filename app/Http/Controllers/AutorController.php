<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index(){

        return view('admin.listarAutor');
    }

    public function create(){

        return view('admin.cadastrarAutor');
    }
}
