<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = [
        'id',
        'produto_id',
        'tipo',
        'quantidade',
        'motivo',
        'data',
    ];

    function produto()
    {
        return $this->belongsTo(Produto::class);
    }
}
