<?php

namespace Database\Seeders;

use App\Models\RemtysCategoria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemtysCategoriaSeeder extends Seeder
{
    public function run(): void
    {
        // Deshabilitar FK para poder truncar
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        RemtysCategoria::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $categorias = [
            [
                'nombre' => 'Consejería Jurídica',
                'slug'   => 'consejeria-juridica',
                'color'  => '#7C3AED',
                'icono'  => 'fa-scale-balanced',
                'orden'  => 1,
            ],
            [
                'nombre' => 'Tesorería Municipal',
                'slug'   => 'tesoreria',
                'color'  => '#DC2626',
                'icono'  => 'fa-coins',
                'orden'  => 2,
            ],
            [
                'nombre' => 'Órgano Interno de Control Municipal',
                'slug'   => 'organo',
                'color'  => '#2563EB',
                'icono'  => 'fa-shield-halved',
                'orden'  => 3,
            ],
        ];

        foreach ($categorias as $cat) {
            RemtysCategoria::create($cat);
        }
    }
}
