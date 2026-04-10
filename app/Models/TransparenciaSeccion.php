<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TransparenciaDocumento;

class TransparenciaSeccion extends Model
{
    protected $table = 'transparencia_secciones';

    protected $fillable = ['grupo_id', 'titulo', 'orden'];

    public function grupo(): BelongsTo
    {
        return $this->belongsTo(TransparenciaGrupo::class, 'grupo_id');
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(TransparenciaDocumento::class, 'seccion_id')->orderBy('orden');
    }
}
