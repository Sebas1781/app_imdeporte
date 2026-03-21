<?php

namespace Database\Seeders;

use App\Models\InstitutoConfig;
use App\Models\OrganigramaItem;
use Illuminate\Database\Seeder;

class InstitutoSeeder extends Seeder
{
    public function run(): void
    {
        InstitutoConfig::updateOrCreate(['id' => 1], [
            'descripcion'    => 'Como parte de la política social del Gobierno Municipal de Tecámac, el Instituto Municipal de Cultura Física y Deporte (IMDEPORTE) tiene como misión fomentar la cultura física y el deporte a través de programas y acciones coordinadas con organismos públicos y privados para mejorar la calidad de vida de los tecamaquenses.',
            'titular_nombre' => 'Mtro. Manuel Fuentes Figueroa',
            'titular_cargo'  => 'Director General del Imdeporte',
            'titular_imagen' => '/images/mtro manuel.png',
        ]);

        $items = [
            ['nombre' => 'Consejo Directivo',                              'nivel' => 1, 'orden' => 1],
            ['nombre' => 'Órgano Interno de Control',                      'nivel' => 1, 'orden' => 2],
            ['nombre' => 'Dirección General',                              'nivel' => 1, 'orden' => 3],
            ['nombre' => 'Coordinación Administrativa',                    'nivel' => 2, 'orden' => 4],
            ['nombre' => 'Coordinación de Cultura Física y del Deporte',   'nivel' => 2, 'orden' => 5],
            ['nombre' => 'Departamento de Cultura Física',                 'nivel' => 3, 'orden' => 6],
            ['nombre' => 'Departamento de Promoción y Fomento al Deporte', 'nivel' => 3, 'orden' => 7],
        ];

        foreach ($items as $item) {
            OrganigramaItem::updateOrCreate(
                ['nombre' => $item['nombre']],
                array_merge($item, ['activo' => true])
            );
        }
    }
}
