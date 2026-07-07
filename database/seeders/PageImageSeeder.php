<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageImage;

class PageImageSeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            [
                'key'         => 'convocatorias',
                'nombre'      => 'Banner Convocatorias (Inicio)',
                'descripcion' => 'Imagen de fondo de la sección Convocatorias en la página de inicio',
                'ruta'        => '/images/convocatorias.jpg',
            ],
            [
                'key'         => 'noticias_interes',
                'nombre'      => 'Banner Boletines (Inicio)',
                'descripcion' => 'Imagen de fondo de la sección Boletines/Noticias en la página de inicio',
                'ruta'        => '/images/noticias_interes.jpg',
            ],
            [
                'key'         => 'fondo1',
                'nombre'      => 'Fondo Municipio (Inicio)',
                'descripcion' => 'Imagen decorativa del municipio en la página de inicio y páginas de transparencia',
                'ruta'        => '/images/fondo1.jpg',
            ],
            [
                'key'         => 'eventos',
                'nombre'      => 'Banner Eventos',
                'descripcion' => 'Imagen de encabezado de la página de Eventos',
                'ruta'        => '/images/EVENTOS.jpg',
            ],
            [
                'key'         => 'instituto',
                'nombre'      => 'Banner Instituto / Transparencia',
                'descripcion' => 'Imagen de encabezado de las páginas de Instituto, Transparencia y Aviso de Privacidad',
                'ruta'        => '/images/INSTITUTO.jpg',
            ],
            [
                'key'         => 'noticias',
                'nombre'      => 'Banner Noticias',
                'descripcion' => 'Imagen de encabezado de la página de Noticias',
                'ruta'        => '/images/NOTICIAS.jpg',
            ],
            [
                'key'         => 'programas',
                'nombre'      => 'Banner Programas',
                'descripcion' => 'Imagen de encabezado de la página de Programas',
                'ruta'        => '/images/PROGRAMAS.jpg',
            ],
            [
                'key'         => 'deporte',
                'nombre'      => 'Banner Deporte',
                'descripcion' => 'Imagen de encabezado de la página de Deporte',
                'ruta'        => '/images/DEPORTE.jpg',
            ],
        ];

        foreach ($images as $image) {
            PageImage::updateOrCreate(['key' => $image['key']], $image);
        }
    }
}
