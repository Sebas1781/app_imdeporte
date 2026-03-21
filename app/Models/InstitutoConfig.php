<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitutoConfig extends Model
{
    protected $fillable = [
        'descripcion',
        'titular_nombre',
        'titular_cargo',
        'titular_imagen',
    ];
}
