<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RedSocial;

class RedSocialSeeder extends Seeder
{
    public function run(): void
    {
        $redes = [
            [
                'nombre' => 'Tecámac',
                'logo'   => '/images/logoTecamac.png',
                'imagen' => '/images/tecamacCard.jpg',
                'url'    => 'https://tecamac.gob.mx/',
                'orden'  => 1,
                'activo' => true,
            ],
            [
                'nombre' => 'DIF Tecámac',
                'logo'   => '/images/logoDif.png',
                'imagen' => '/images/imgDif.jpg',
                'url'    => 'https://dif.tecamac.gob.mx/',
                'orden'  => 2,
                'activo' => true,
            ],
            [
                'nombre' => 'ODAPAS',
                'logo'   => '/images/odapasLogo.png',
                'imagen' => '/images/imgOdaspas.jpg',
                'url'    => 'https://www.facebook.com/profile.php?id=100068195911608#',
                'orden'  => 3,
                'activo' => true,
            ],
            [
                'nombre' => 'Guardia Civil',
                'logo'   => '/images/logoGuardiaCivil.png',
                'imagen' => '/images/imgGuardiaCivil.jpg',
                'url'    => 'https://www.facebook.com/ComisariaSPTecamac/',
                'orden'  => 4,
                'activo' => true,
            ],
            [
                'nombre' => 'ImDeporte',
                'logo'   => '/images/logoImdeporte.png',
                'imagen' => '/images/imgImDeporte.jpg',
                'url'    => 'https://www.facebook.com/UMCFyD/',
                'orden'  => 5,
                'activo' => true,
            ],
        ];

        foreach ($redes as $red) {
            RedSocial::firstOrCreate(['nombre' => $red['nombre']], $red);
        }
    }
}
