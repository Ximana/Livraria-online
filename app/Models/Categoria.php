<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria', 'descricao'];

    public function livros()
    {
        return $this->belongsToMany(Livro::class, 'categoria_livros', 'id_categoria', 'id_livro')
                    ->withTimestamps();
    }
    
}
