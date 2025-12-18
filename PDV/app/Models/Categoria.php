<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = [
        'tipo',
    ];

    public function produto()
    {
        return $this->hasMany(Produto::class);
    }

}
