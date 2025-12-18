<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
 protected $fillable = [
        'nome',
        'preco',
        'estoque',
        'codigo_barras',
        'status',
        'categoria_id',
    ];

    function estoque()
    {
        return $this->belongsTo(Estoque::class);
    }

    function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
