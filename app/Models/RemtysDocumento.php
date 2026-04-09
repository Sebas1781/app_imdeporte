<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemtysDocumento extends Model
{
    protected $table = 'remtys_documentos';

    protected $fillable = ['categoria_id', 'nombre', 'tipo_archivo', 'archivo', 'orden', 'activo'];

    protected function casts(): array
    {
        return ['activo' => 'boolean'];
    }

    public function categoria()
    {
        return $this->belongsTo(RemtysCategoria::class, 'categoria_id');
    }
}
