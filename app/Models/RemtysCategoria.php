<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemtysCategoria extends Model
{
    protected $table = 'remtys_categorias';

    protected $fillable = ['nombre', 'slug', 'color', 'icono', 'orden'];

    public function documentos()
    {
        return $this->hasMany(RemtysDocumento::class, 'categoria_id');
    }
}
