<?php

namespace Database\Seeders;

use App\Models\CulturaFisicaItem;
use Illuminate\Database\Seeder;

class CulturaFisicaItemSeeder extends Seeder
{
    public function run(): void
    {
        $actividades = [
            [
                'tipo'        => 'actividad',
                'titulo'      => 'EVENTOS DEPORTIVOS',
                'descripcion' => 'El Imdeporte promueve la cultura física mediante eventos como carreras atléticas, torneos de fútbol, básquetbol y voleibol. Haz clic en la categoría de tu interés para conocer los detalles de cada evento.',
                'imagen'      => '/images/ICONOS DEPORTE/ATLETISMO.png',
                'url'         => '#',
                'orden'       => 1,
            ],
            [
                'tipo'        => 'actividad',
                'titulo'      => 'PONTE FITNESS',
                'descripcion' => 'Programa de activación física con clases gratuitas como baile deportivo, step y Pilates, dirigido a mujeres en Tecámac.',
                'imagen'      => '/images/ICONOS DEPORTE/LEVANTAMIENTO-DE-PESAS.png',
                'url'         => '#',
                'orden'       => 2,
            ],
            [
                'tipo'        => 'actividad',
                'titulo'      => 'ACTIVIDADES RECREATIVAS',
                'descripcion' => 'El Imdeporte organiza rodadas, torneos y carreras recreativas para fomentar el desarrollo motor, la convivencia y los valores en niños y jóvenes.',
                'imagen'      => '/images/ICONOS DEPORTE/CICLISMO.png',
                'url'         => '#',
                'orden'       => 3,
            ],
        ];

        $servicios = [
            [
                'tipo'        => 'servicio',
                'titulo'      => 'FISIOTERAPIA',
                'descripcion' => 'A través del área de Fisioterapia, se ofrecen terapias de rehabilitación para el público en general y deportistas de Tecámac, a bajos costos con el objetivo de otorgar el servicio de manera accesible.',
                'imagen'      => '/images/ICONOS DEPORTE/GIMNASIA-ARTISTICA.png',
                'url'         => '#',
                'orden'       => 1,
            ],
            [
                'tipo'        => 'servicio',
                'titulo'      => 'ORIENTACIONES FÍSICAS NUTRICIONALES',
                'descripcion' => 'Se atiende de manera ambulatoria a parques públicos de Tecámac, donde acude personal capacitado del Imdeporte en materia de nutrición y cultura física.',
                'imagen'      => '/images/ICONOS DEPORTE/GIMNASIA-RITMICA.png',
                'url'         => '#',
                'orden'       => 2,
            ],
            [
                'tipo'        => 'servicio',
                'titulo'      => 'MEDICINA DEPORTIVA',
                'descripcion' => 'Brindamos atención a los deportistas destacados del municipio de Tecámac; se centra en la prevención, diagnóstico y tratamiento de lesiones relacionadas con la actividad física y el deporte; brindar asesoramiento sobre entrenamientos.',
                'imagen'      => '/images/ICONOS DEPORTE/NATACION.png',
                'url'         => '#',
                'orden'       => 3,
            ],
        ];

        foreach (array_merge($actividades, $servicios) as $item) {
            CulturaFisicaItem::firstOrCreate(
                ['tipo' => $item['tipo'], 'titulo' => $item['titulo']],
                $item
            );
        }
    }
}
