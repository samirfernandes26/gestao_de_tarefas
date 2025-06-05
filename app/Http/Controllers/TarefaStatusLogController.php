<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\TarefaStatusLog;
use App\Models\Tarefa;
use App\Models\User;

class TarefaStatusLogController extends Controller
{
    /**
     * Exibe o histórico de alterações de status das tarefas.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        $logs = TarefaStatusLog::with(['tarefa', 'user'])
            ->orderByDesc('alterado_em') // já que não há timestamps, usamos o campo correto
            ->get();

        return Inertia::render('TarefaStatusLogs/Index', [
            'logs' => $logs
        ]);
    }

    /**
     * Armazena um novo registro de alteração de status.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tarefa_id' => 'required|exists:tarefas,id',
            'status_anterior' => 'nullable|string|max:100',
            'status_novo' => 'required|string|max:100',
            'alterado_por' => 'required|exists:users,id',
        ]);

        TarefaStatusLog::create([
            'tarefa_id' => $validated['tarefa_id'],
            'status_anterior' => $validated['status_anterior'],
            'status_novo' => $validated['status_novo'],
            'alterado_por' => $validated['alterado_por'],
            'alterado_em' => now(),
        ]);

        return redirect()->back()->with('success', 'Status registrado com sucesso!');
    }

    /**
     * Remove um log de status específico.
     *
     * @param \App\Models\TarefaStatusLog $log
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(TarefaStatusLog $log)
    {
        $log->delete();

        return redirect()->back()->with('success', 'Log removido com sucesso.');
    }
}
