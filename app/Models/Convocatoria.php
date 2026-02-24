<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    protected $table = 'convocatorias';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'url_externa',
        'fecha',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'fecha' => 'date',
            'activo' => 'boolean',
        ];
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderByDesc('fecha');
    }

    public function scopeRecientes($query, int $limit = 9)
    {
        return $query->activos()->limit($limit);
    }
}
