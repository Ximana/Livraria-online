<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritoController extends Controller
{
    public function index(){

        return view('livraria.favoritos');
    }
}
