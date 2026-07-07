<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    protected $fillable = ['key', 'nombre', 'descripcion', 'ruta'];

    public static function byKey(string $key, string $default = ''): string
    {
        return static::where('key', $key)->value('ruta') ?? $default;
    }
}
