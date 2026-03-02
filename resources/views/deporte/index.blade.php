@extends('layouts.app')

@section('title', 'Deporte - IMDEPORTE Tecámac')

@section('content')

{{-- Hero Banner --}}
<section class="relative w-full overflow-hidden" style="height: 340px;">
    <img src="/images/DEPORTE.jpg" alt="Deporte" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-gradient-to-r from-[#7B2D8E]/85 via-[#7B2D8E]/60 to-transparent"></div>
    <div class="relative z-10 flex flex-col justify-center h-full max-w-5xl mx-auto px-8">
        <h1 class="text-white text-5xl md:text-6xl font-extrabold tracking-wide drop-shadow-lg">DEPORTE</h1>
    </div>
</section>

{{-- Intro --}}
<section class="py-10 bg-white">
    <div class="max-w-3xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-extrabold text-gray-800 mb-4">¡Es Hora de Moverse!</h2>
        <p class="text-gray-600 text-base leading-relaxed">
            No importa si eres un atleta experimentado o si apenas vas a dar tu primer paso; en nuestro municipio hay una cancha,
            una pista o un gimnasio esperándote. Haz clic en la categoría de tu interés para conocer los detalles de cada disciplina,
            horarios, sedes y cómo inscribirte.
        </p>
        <p class="text-gray-600 text-base leading-relaxed mt-4">
            ¡Actuálate, diviértete y forma parte de nuestra gran familia deportiva!
        </p>
    </div>
</section>

{{-- Grid de deportes --}}
<section class="py-10 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        @php
        $deportes = [
            ['icono' => 'ACUATLON.png',              'nombre' => 'Acuatlón'],
            ['icono' => 'AJEDREZ.png',               'nombre' => 'Ajedrez'],
            ['icono' => 'ATLETISMO.png',             'nombre' => 'Atletismo'],
            ['icono' => 'BADMINTON.png',             'nombre' => 'Badminton'],
            ['icono' => 'BALONCESTO-3X3.png',        'nombre' => 'Baloncesto 3x3'],
            ['icono' => 'BALONCESTO-5X5.png',        'nombre' => 'Baloncesto 5x5'],
            ['icono' => 'BEISBOL.png',               'nombre' => 'Beisbol'],
            ['icono' => 'BOXEO.png',                 'nombre' => 'Boxeo'],
            ['icono' => 'CACHIBOL.png',              'nombre' => 'Cachibol'],
            ['icono' => 'CANOTAJE.png',              'nombre' => 'Canotaje'],
            ['icono' => 'CICLISMO.png',              'nombre' => 'Ciclismo'],
            ['icono' => 'CLAVADOS.png',              'nombre' => 'Clavados'],
            ['icono' => 'ESGRIMA.png',               'nombre' => 'Esgrima'],
            ['icono' => 'FRONTON.png',               'nombre' => 'Frontón'],
            ['icono' => 'FUTBOL.png',                'nombre' => 'Fútbol'],
            ['icono' => 'GIMNASIA-ARTISTICA.png',    'nombre' => 'Gim. Artística'],
            ['icono' => 'GIMNASIA-RITMICA.png',      'nombre' => 'Gim. Rítmica'],
            ['icono' => 'GIMNASIA-TRAMPOLIN.png',    'nombre' => 'Gim. Trampolín'],
            ['icono' => 'HANDBOL.png',               'nombre' => 'Handbol'],
            ['icono' => 'HOCKEY-SOBRE-PASTO.png',   'nombre' => 'Hockey s/pasto'],
            ['icono' => 'JUDO.png',                  'nombre' => 'Judo'],
            ['icono' => 'KARATE-DO.png',             'nombre' => 'Karate Do'],
            ['icono' => 'LEVANTAMIENTO-DE-PESAS.png','nombre' => 'Pesas'],
            ['icono' => 'NATACION.png',              'nombre' => 'Natación'],
            ['icono' => 'PENTATLON.png',             'nombre' => 'Pentatión'],
            ['icono' => 'POLO-ACUATICO.png',         'nombre' => 'Polo acuático'],
            ['icono' => 'RAQUETBOL.png',             'nombre' => 'Raquetbol'],
            ['icono' => 'REMO.png',                  'nombre' => 'Remo'],
            ['icono' => 'SOFTBOL.png',               'nombre' => 'Softbol'],
            ['icono' => 'SQUASH.png',                'nombre' => 'Squash'],
            ['icono' => 'TAEKWONDO.png',             'nombre' => 'Taekwondo'],
            ['icono' => 'TENIS.png',                 'nombre' => 'Tenis'],
            ['icono' => 'TIRO-CON-ARCO.png',         'nombre' => 'Tiro con arco'],
            ['icono' => 'TIRO-DEPORTIVO.png',        'nombre' => 'Tiro deportivo'],
            ['icono' => 'TOCHO.png',                 'nombre' => 'Tocho'],
            ['icono' => 'VOLEIBOL.png',              'nombre' => 'Voleibol'],
        ];
        @endphp
        <div class="grid grid-cols-3 sm:grid-cols-4 md:grid-cols-5 gap-4">
            @foreach($deportes as $deporte)
                <a href="#" class="flex flex-col items-center justify-start p-4 bg-white rounded-xl border border-gray-200 hover:border-[#7B2D8E] hover:shadow-md transition group">
                    <img src="/images/ICONOS%20DEPORTE/{{ $deporte['icono'] }}" alt="{{ $deporte['nombre'] }}" class="w-16 h-16 object-contain mb-2">
                    <span class="text-gray-700 text-xs font-semibold text-center leading-tight">{{ $deporte['nombre'] }}</span>
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- Imagen pie --}}
<section class="relative">
    <img src="/images/pie.png" alt="IMDEPORTE Tecámac" class="w-full h-auto object-cover">
</section>

@endsection
