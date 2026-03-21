<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganigramaItem extends Model
{
    protected $fillable = [
        'nombre',
        'nivel',
        'orden',
        'activo',
    ];

    protected function casts(): array
    {
        return [
            'activo' => 'boolean',
        ];
    }
}
