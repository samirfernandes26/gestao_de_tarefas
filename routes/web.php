<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


use App\Http\Controllers\CondominioController;
use App\Http\Controllers\PrestadorServicoController;
use App\Http\Controllers\TarefaController;
// use App\Http\Controllers\ComentarioTarefa\ComentarioTarefaController;
use App\Http\Controllers\TarefaStatusLogController;
// use App\Http\Controllers\AnexoTarefa\AnexoTarefaController;
// use App\Http\Controllers\Notificacao\NotificacaoController;
// use App\Http\Controllers\LogAlteracao\LogAlteracaoController;


Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::prefix('tarefas')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
    // Route::get('/create', [TarefaController::class, 'create'])->name('tarefas.create');
    // Route::post('/', [TarefaController::class, 'store'])->name('tarefas.store');
    // Route::get('/{tarefa}', [TarefaController::class, 'show'])->name('tarefas.show');
    // Route::get('/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
    // Route::put('/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');
    // Route::delete('/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
});

Route::prefix('condominios')->group(function () {
    
    Route::get('/', [CondominioController::class, 'index'])->name('condominios.index');
    // Route::get('/create', [CondominioController::class, 'create'])->name('condominios.create');
    // Route::post('/', [CondominioController::class, 'store'])->name('condominios.store');
    // Route::get('/{condominio}/edit', [CondominioController::class, 'edit'])->name('condominios.edit');
    // Route::put('/{condominio}', [CondominioController::class, 'update'])->name('condominios.update');
    // Route::delete('/{condominio}', [CondominioController::class, 'destroy'])->name('condominios.destroy');
});



Route::prefix('prestadores')->group(function () {
    Route::get('/', [PrestadorServicoController::class, 'index'])->name('prestadores.index');
    // Route::get('/create', [PrestadorServicoController::class, 'create'])->name('prestadores.create');
    // Route::post('/', [PrestadorServicoController::class, 'store'])->name('prestadores.store');
    // Route::get('/{prestador}/edit', [PrestadorServicoController::class, 'edit'])->name('prestadores.edit');
    // Route::put('/{prestador}', [PrestadorServicoController::class, 'update'])->name('prestadores.update');
    // Route::delete('/{prestador}', [PrestadorServicoController::class, 'destroy'])->name('prestadores.destroy');
},);

Route::prefix('tarefa-status-logs')->group(function () {
    Route::get('/', [TarefaStatusLogController::class, 'index'])->name('tarefa-status-logs.index');
    // Route::post('/', [TarefaStatusLogController::class, 'store'])->name('tarefa-status-logs.store');
    // Route::delete('/{log}', [TarefaStatusLogController::class, 'destroy'])->name('tarefa-status-logs.destroy');
});




require __DIR__ . '/auth.php';
