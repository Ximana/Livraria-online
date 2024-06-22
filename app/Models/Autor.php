<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    protected $table = 'autores'; // Especificando o nome correto da tabela
    
    protected $fillable = ['nome', 'profissao', 'biografia'];
}
