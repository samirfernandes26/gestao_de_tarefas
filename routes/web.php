<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// use App\Http\Controllers\CondominioController;
// use App\Http\Controllers\Prestador\PrestadorServicoController;
use App\Http\Controllers\TarefaController;
// use App\Http\Controllers\ComentarioTarefa\ComentarioTarefaController;
// use App\Http\Controllers\TarefaStatus\TarefaStatusLogController;
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


// Route::apiResource('condominios', CondominioController::class);
// Route::apiResource('prestadores-servico', PrestadorServicoController::class);
Route::prefix('tarefas')->group(function () {
    Route::get('/', [TarefaController::class, 'index'])->name('tarefas.index');
    // Route::get('/create', [TarefaController::class, 'create'])->name('tarefas.create');
    // Route::post('/', [TarefaController::class, 'store'])->name('tarefas.store');
    // Route::get('/{tarefa}', [TarefaController::class, 'show'])->name('tarefas.show');
    // Route::get('/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
    // Route::put('/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');
    // Route::delete('/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
});
// Route::apiResource('comentarios-tarefa', ComentarioTarefaController::class);
// Route::apiResource('tarefa-status-log', TarefaStatusLogController::class);
// Route::apiResource('anexos-tarefa', AnexoTarefaController::class);
// Route::apiResource('notificacoes', NotificacaoController::class);
// Route::apiResource('log-alteracoes', LogAlteracaoController::class);

require __DIR__ . '/auth.php';
