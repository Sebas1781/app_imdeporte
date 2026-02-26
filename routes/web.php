<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoletinPublicController;
use App\Http\Controllers\ConvocatoriaPublicController;
use App\Http\Controllers\InstitutoController;
use App\Http\Controllers\ProgramaPublicController;
use App\Http\Controllers\EventoPublicController;
use App\Http\Controllers\NoticiaPublicController;
use App\Http\Controllers\CulturaFisicaController;
use App\Http\Controllers\DeporteController;
use App\Http\Controllers\TransparenciaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\BoletinController;
use App\Http\Controllers\Admin\ConvocatoriaController;
use App\Http\Controllers\Admin\ProgramaController;
use App\Http\Controllers\Admin\EventoController;
use App\Http\Controllers\Admin\NoticiaController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RedSocialController;

// Public routes
Route::get('/servicios/remtys', fn() => view('servicios.remtys'))->name('servicios.remtys');
Route::get('/transparencia/ley-contabilidad', fn() => view('transparencia.ley-contabilidad'))->name('transparencia.ley-contabilidad');

Route::get('/', [HomeController::class, 'index']);
Route::get('/instituto', [InstitutoController::class, 'index'])->name('instituto.index');
Route::get('/programas', [ProgramaPublicController::class, 'index'])->name('programas.index');
Route::get('/programas/{programa}', [ProgramaPublicController::class, 'show'])->name('programas.show');
Route::get('/eventos', [EventoPublicController::class, 'index'])->name('eventos.index');
Route::get('/eventos/{evento}', [EventoPublicController::class, 'show'])->name('eventos.show');
Route::get('/noticias', [NoticiaPublicController::class, 'index'])->name('noticias.index');
Route::get('/noticias/{noticia}', [NoticiaPublicController::class, 'show'])->name('noticias.show');
Route::get('/cultura-fisica', [CulturaFisicaController::class, 'index'])->name('cultura-fisica.index');
Route::get('/deporte', [DeporteController::class, 'index'])->name('deporte.index');
Route::get('/transparencia', [TransparenciaController::class, 'index'])->name('transparencia.index');
Route::get('/boletines', [BoletinPublicController::class, 'index'])->name('boletines.index');
Route::get('/boletines/{boletin}', [BoletinPublicController::class, 'show'])->name('boletines.show');
Route::get('/convocatorias', [ConvocatoriaPublicController::class, 'index'])->name('convocatorias.index');
Route::get('/convocatorias/{convocatoria}', [ConvocatoriaPublicController::class, 'show'])->name('convocatorias.show');

// Auth routes
Route::get('/admin/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// Admin routes (protected)
Route::prefix('admin')->middleware(['auth', 'admin'])->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Carousel CRUD
    Route::get('/carousel', [CarouselController::class, 'index'])->name('carousel.index');
    Route::get('/carousel/create', [CarouselController::class, 'create'])->name('carousel.create');
    Route::post('/carousel', [CarouselController::class, 'store'])->name('carousel.store');
    Route::get('/carousel/{carousel}/edit', [CarouselController::class, 'edit'])->name('carousel.edit');
    Route::put('/carousel/{carousel}', [CarouselController::class, 'update'])->name('carousel.update');
    Route::delete('/carousel/{carousel}', [CarouselController::class, 'destroy'])->name('carousel.destroy');

    // Boletines CRUD
    Route::get('/boletines', [BoletinController::class, 'index'])->name('boletines.index');
    Route::get('/boletines/create', [BoletinController::class, 'create'])->name('boletines.create');
    Route::post('/boletines', [BoletinController::class, 'store'])->name('boletines.store');
    Route::get('/boletines/{boletin}/edit', [BoletinController::class, 'edit'])->name('boletines.edit');
    Route::put('/boletines/{boletin}', [BoletinController::class, 'update'])->name('boletines.update');
    Route::delete('/boletines/{boletin}', [BoletinController::class, 'destroy'])->name('boletines.destroy');

    // Convocatorias CRUD
    Route::get('/convocatorias', [ConvocatoriaController::class, 'index'])->name('convocatorias.index');
    Route::get('/convocatorias/create', [ConvocatoriaController::class, 'create'])->name('convocatorias.create');
    Route::post('/convocatorias', [ConvocatoriaController::class, 'store'])->name('convocatorias.store');
    Route::get('/convocatorias/{convocatoria}/edit', [ConvocatoriaController::class, 'edit'])->name('convocatorias.edit');
    Route::put('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'update'])->name('convocatorias.update');
    Route::delete('/convocatorias/{convocatoria}', [ConvocatoriaController::class, 'destroy'])->name('convocatorias.destroy');

<<<<<<< HEAD
    // Programas CRUD
    Route::get('/programas', [ProgramaController::class, 'index'])->name('programas.index');
    Route::get('/programas/create', [ProgramaController::class, 'create'])->name('programas.create');
    Route::post('/programas', [ProgramaController::class, 'store'])->name('programas.store');
    Route::get('/programas/{programa}/edit', [ProgramaController::class, 'edit'])->name('programas.edit');
    Route::put('/programas/{programa}', [ProgramaController::class, 'update'])->name('programas.update');
    Route::delete('/programas/{programa}', [ProgramaController::class, 'destroy'])->name('programas.destroy');

    // Eventos CRUD
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
    Route::get('/eventos/{evento}/edit', [EventoController::class, 'edit'])->name('eventos.edit');
    Route::put('/eventos/{evento}', [EventoController::class, 'update'])->name('eventos.update');
    Route::delete('/eventos/{evento}', [EventoController::class, 'destroy'])->name('eventos.destroy');

    // Noticias CRUD
    Route::get('/noticias', [NoticiaController::class, 'index'])->name('noticias.index');
    Route::get('/noticias/create', [NoticiaController::class, 'create'])->name('noticias.create');
    Route::post('/noticias', [NoticiaController::class, 'store'])->name('noticias.store');
    Route::get('/noticias/{noticia}/edit', [NoticiaController::class, 'edit'])->name('noticias.edit');
    Route::put('/noticias/{noticia}', [NoticiaController::class, 'update'])->name('noticias.update');
    Route::delete('/noticias/{noticia}', [NoticiaController::class, 'destroy'])->name('noticias.destroy');
=======
    // Redes Sociales CRUD
    Route::resource('/redes-sociales', RedSocialController::class)->names('redes-sociales');
>>>>>>> 694671eb8100c005866dd9649bac0ac26cf6fc8b

    // Users CRUD
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});
