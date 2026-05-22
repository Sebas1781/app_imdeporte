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
            'titular_nombre' => 'Manuel Díaz Guerra',
            'titular_cargo'  => 'Director General del Imdeporte',
            'titular_imagen' => '/images/mtro manuel.png',
        ]);

        // Limpiar items anteriores para reconstruir desde cero
        OrganigramaItem::truncate();

        $items = [
            // Nivel 1 — Dirección General
            ['nombre' => 'Director General',                                                                                   'responsable' => 'Manuel Díaz Guerra',                    'nivel' => 1, 'orden' => 1],

            // Nivel 2 — Unidades y Direcciones
            ['nombre' => 'I. Unidad Jurídica y de Transparencia',                                                              'responsable' => 'Ernestina Julieta Espinoza Martínez',   'nivel' => 2, 'orden' => 2],
            ['nombre' => 'II. Unidad de Comunicación Social',                                                                  'responsable' => 'Axl Galindo Galindo',                   'nivel' => 2, 'orden' => 5],
            ['nombre' => 'III. Unidad de Tecnologías de la Información',                                                       'responsable' => 'Jonathan Salvador Díaz Madrid',         'nivel' => 2, 'orden' => 6],
            ['nombre' => 'IV. Dirección de Cultura Física y Fomento Deportivo',                                                'responsable' => 'Ariae López Díaz',                      'nivel' => 2, 'orden' => 7],
            ['nombre' => 'V. Dirección de Finanzas y Administración',                                                          'responsable' => 'Janet Marcela Ramírez Noé',             'nivel' => 2, 'orden' => 11],
            ['nombre' => 'VI. Dirección de Infraestructura Deportiva y Recreativa',                                            'responsable' => 'Marcos Trujillo León',                  'nivel' => 2, 'orden' => 20],

            // Nivel 3 — Departamentos / Subdirecciones bajo Unidad Jurídica
            ['nombre' => 'A. Departamento de Archivo',                                                                         'responsable' => 'Emmarelly Evangelina Hernández Barajas','nivel' => 3, 'orden' => 3],
            ['nombre' => 'B. Departamento de Transparencia y Mejora Regulatoria',                                              'responsable' => null,                                    'nivel' => 3, 'orden' => 4],

            // Nivel 3 — bajo Dirección de Cultura Física
            ['nombre' => 'A. Departamento de Cultura Física',                                                                  'responsable' => 'Diego Aldo Galindo',                    'nivel' => 3, 'orden' => 8],
            ['nombre' => 'B. Departamento de Promoción Fomento al Deporte',                                                    'responsable' => 'Edder Padilla Luna',                    'nivel' => 3, 'orden' => 9],
            ['nombre' => 'C. Coordinación de Albercas',                                                                        'responsable' => 'Gabriel Ruz Nava',                      'nivel' => 3, 'orden' => 10],

            // Nivel 3 — bajo Dirección de Finanzas
            ['nombre' => 'A. Subdirección de Administración',                                                                  'responsable' => 'Daniel Francisco González Santillán',   'nivel' => 3, 'orden' => 12],
            ['nombre' => 'B. Subdirección de Cuenta Pública',                                                                  'responsable' => 'Mario Villanueva Ibarra',               'nivel' => 3, 'orden' => 16],

            // Nivel 4 — bajo Subdirección de Administración
            ['nombre' => '1. Departamento de Recursos Humanos',                                                                'responsable' => 'Nidia Rocío Sánchez Picazo',            'nivel' => 4, 'orden' => 13],
            ['nombre' => '2. Departamento de Recursos Materiales y de Almacén',                                                'responsable' => 'Juan Carlos García de la Cruz',         'nivel' => 4, 'orden' => 14],
            ['nombre' => '3. Departamento de Control Vehicular y Mantenimiento Vehicular',                                     'responsable' => 'Adriana Alzua Callejas',                'nivel' => 4, 'orden' => 15],

            // Nivel 4 — bajo Subdirección de Cuenta Pública
            ['nombre' => '1. Departamento de Ingresos',                                                                        'responsable' => 'Vacante',                               'nivel' => 4, 'orden' => 17],
            ['nombre' => '2. Departamento de Patrimonio',                                                                      'responsable' => 'Anaí Galindo González',                 'nivel' => 4, 'orden' => 18],
            ['nombre' => '3. Unidad de Información Planeación Presupuestación y Evolución',                                    'responsable' => 'Osmar Buendía Sánchez',                 'nivel' => 4, 'orden' => 19],

            // Nivel 3 — bajo Dirección de Infraestructura Deportiva
            ['nombre' => 'A. Subdirección de Operación, Conservación y Mantenimiento de Unidades Deportivas y Recreativas',   'responsable' => 'Alejandro Alarcón Flores',              'nivel' => 3, 'orden' => 21],
            ['nombre' => 'B. Subdirección y Administración del Parque Ecológico y Deportivo Sierra Hermosa',                   'responsable' => 'Arturo Cerón Ávila',                    'nivel' => 3, 'orden' => 25],
            ['nombre' => 'C. Coordinación de Conservación y Mantenimiento de Parques y Áreas Deportivas y Recreativas',       'responsable' => 'Vacante',                               'nivel' => 3, 'orden' => 29],

            // Nivel 4 — bajo Subdirección de Operación (Unidades Deportivas)
            ['nombre' => '1. Coordinación de Normatividad y Recaudación (Unidades Deportivas)',                                'responsable' => 'Israel Anguiano García',                'nivel' => 4, 'orden' => 22],
            ['nombre' => '2. Departamento de Seguridad y Gestión de Riesgos (Unidades Deportivas)',                            'responsable' => 'Esthela Luvier Vega Andrade',           'nivel' => 4, 'orden' => 23],
            ['nombre' => '3. Departamento de Conservación y Mantenimiento (Unidades Deportivas)',                              'responsable' => 'Vacante',                               'nivel' => 4, 'orden' => 24],

            // Nivel 4 — bajo Subdirección Parque Sierra Hermosa
            ['nombre' => '1. Coordinación de Normatividad y Recaudación (Parque Sierra Hermosa)',                              'responsable' => 'Yosadara Vega Andrade',                 'nivel' => 4, 'orden' => 26],
            ['nombre' => '2. Departamento de Seguridad y Gestión de Riesgos (Parque Sierra Hermosa)',                          'responsable' => 'Ruben Nájera Vázquez',                  'nivel' => 4, 'orden' => 27],
            ['nombre' => '3. Departamento de Conservación y Mantenimiento (Parque Sierra Hermosa)',                            'responsable' => 'Vacante',                               'nivel' => 4, 'orden' => 28],
        ];

        foreach ($items as $item) {
            OrganigramaItem::create(array_merge($item, ['activo' => true]));
        }
    }
}
