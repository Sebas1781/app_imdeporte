<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CulturaFisicaItem extends Model
{
    protected $table = 'cultura_fisica_items';

    protected $fillable = [
        'tipo',
        'titulo',
        'descripcion',
        'imagen',
        'url',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }

    public function scopeActivos($query)
    {
        return $query->where('activo', true)->orderBy('orden');
    }

    public function scopeActividades($query)
    {
        return $query->where('tipo', 'actividad');
    }

    public function scopeServicios($query)
    {
        return $query->where('tipo', 'servicio');
    }
}
