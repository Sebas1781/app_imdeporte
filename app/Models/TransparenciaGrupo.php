<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TransparenciaSeccion;

class TransparenciaGrupo extends Model
{
    protected $fillable = ['tipo', 'anio', 'orden'];

    public function secciones(): HasMany
    {
        return $this->hasMany(TransparenciaSeccion::class, 'grupo_id')->orderBy('orden');
    }

    public function getNombreCompletoAttribute(): string
    {
        $labels = [
            'sevac'       => 'SEVAC',
            'conac'       => 'CONAC',
            'presupuesto' => 'Presupuesto',
        ];
        return ($labels[$this->tipo] ?? strtoupper($this->tipo)) . ' ' . $this->anio;
    }
}
