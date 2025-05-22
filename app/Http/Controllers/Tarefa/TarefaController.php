<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\PrestadorServico;
use App\Models\Condominio;
use Inertia\Inertia;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::with('condominio', 'prestador')->get();

        return Inertia::render('Tarefas/Index', [
            'tarefas' => $tarefas
        ]);
    }

    public function create()
    {
        return Inertia::render('Tarefas/Create', [
            'condominios' => Condominio::all(),
            'prestadores' => PrestadorServico::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'condominio_id' => 'required|exists:condominios,id',
            'prestador_id' => 'required|exists:prestadores,id',
            'data_manutencao' => 'required|date',
            'prazo_meses' => 'nullable|integer|min:1|max:24',
            'prioridade' => 'required|in:Alta,Média,Baixa',
            'status' => 'required|in:Não iniciada,Em andamento,Em execução,Concluída',
            'situacao' => 'required|in:Em dia,Atrasado',
            'repetir_em_meses' => 'nullable|integer|min:1|max:24',
            'observacoes' => 'nullable|string',
        ]);

        Tarefa::create($validated);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa criada com sucesso.');
    }

    public function show(Tarefa $tarefa)
    {
        $tarefa->load('condominio', 'prestador');

        return Inertia::render('Tarefas/Show', [
            'tarefa' => $tarefa
        ]);
    }

    public function edit(Tarefa $tarefa)
    {
        return Inertia::render('Tarefas/Edit', [
            'tarefa' => $tarefa,
            'condominios' => Condominio::all(),
            'prestadores' => PrestadorServico::all()
        ]);
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $validated = $request->validate([
            'descricao' => 'required|string|max:255',
            'condominio_id' => 'required|exists:condominios,id',
            'prestador_id' => 'required|exists:prestadores,id',
            'data_manutencao' => 'required|date',
            'prazo_meses' => 'nullable|integer|min:1|max:24',
            'prioridade' => 'required|in:Alta,Média,Baixa',
            'status' => 'required|in:Não iniciada,Em andamento,Em execução,Concluída',
            'situacao' => 'required|in:Em dia,Atrasado',
            'repetir_em_meses' => 'nullable|integer|min:1|max:24',
            'observacoes' => 'nullable|string',
        ]);

        $tarefa->update($validated);

        return redirect()->route('tarefas.index')->with('success', 'Tarefa atualizada com sucesso.');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();

        return redirect()->route('tarefas.index')->with('success', 'Tarefa excluída com sucesso.');
    }
}

