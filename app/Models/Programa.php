<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programa extends Model
{
    protected $table = 'programas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'url_externa',
        'fecha',
        'activo',
        'orden',
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
        return $query->where('activo', true)->orderBy('orden');
    }

    public function scopeRecientes($query, int $limit = 9)
    {
        return $query->activos()->limit($limit);
    }
}
