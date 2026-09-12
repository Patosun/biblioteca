<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    public function Categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
