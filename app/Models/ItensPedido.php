<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItensPedido extends Model
{
    use HasFactory;

    protected $fillable = ['pedido_id', 'livro_id', 'quantidade', 'preco_unitario'];

    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }

    public function livro()
    {
        return $this->belongsTo(Livro::class);
    }
}
