<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
    use HasFactory;


    protected $table = 'favoritos';
    protected $fillable = ['user_id', 'livro_id'];

     public function livro()
    {
        return $this->belongsTo(Livro::class, 'livro_id');
    }
    
}

