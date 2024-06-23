<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'editora',
        'isbn',
        'idioma',
        'resumo',
        'data_publicacao',
        'preco',
        'quantidade',
        'imagem',
    ];

     public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_livros', 'id_livro', 'id_categoria')
                    ->withTimestamps();
    }

     public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autores_livros', 'id_livro', 'id_autor')
                    ->withPivot('descricao')
                    ->withTimestamps();
    }
    

    public function favoritos()
{
    return $this->belongsToMany(User::class, 'favoritos');
}
}
