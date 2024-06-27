<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrinho extends Model
{
    use HasFactory;

    protected $table = 'carrinho'; // Especificando o nome correto da tabela

    public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
}
