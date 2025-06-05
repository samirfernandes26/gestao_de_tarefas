<?php

namespace App\Http\Controllers;

use App\Models\LogAlteracao;
use Illuminate\Http\Request;
use Inertia\Inertia;

class LogAlteracaoController extends Controller
{
    /**
     * Lista os logs de alterações com os dados antigos e novos.
     */
    public function index()
    {
        $logs = LogAlteracao::with('user')
            ->orderByDesc('data_hora')
            ->get();

        return Inertia::render('LogsAlteracao/Index', [
            'logs' => $logs
        ]);
    }

    /**
     * Exibe um log específico (opcional).
     */
    public function show(LogAlteracao $log)
    {
        return Inertia::render('LogsAlteracao/Show', [
            'log' => $log->load('user')
        ]);
    }
}
