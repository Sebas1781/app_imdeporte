<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Boletin extends Model
{
    protected $table = 'boletines';

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

    /**
     * Get the most recent boletines for the carousel (limit configurable).
     */
    public function scopeRecientes($query, int $limit = 9)
    {
        return $query->activos()->limit($limit);
    }
}
