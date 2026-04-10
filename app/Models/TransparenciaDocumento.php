<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransparenciaDocumento extends Model
{
    protected $fillable = ['seccion_id', 'nombre', 'tipo_archivo', 'archivo', 'orden', 'activo'];

    protected $casts = [
        'activo' => 'boolean',
    ];

    public function seccion(): BelongsTo
    {
        return $this->belongsTo(TransparenciaSeccion::class, 'seccion_id');
    }
}
