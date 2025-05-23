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
        return Inertia::render('Tarefas/Index', [
            'tarefas' => Tarefa::with('condominio', 'prestador')->get(),
            'condominio' => Condominio::all(),
            'prestador' => PrestadorServico::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Tarefas/Create', [
            'condominio' => Condominio::all(),
            'prestador' => PrestadorServico::all(),
        ]);
    }

    public function store(Request $request)
    {
        Tarefa::create($request->all());

        return redirect()->route('tarefas.index')->with('success','');
    }

    
    public function show(Tarefa $tarefa)
    {
        return Inertia::render('', []);
    }


    public function edit(Tarefa $tarefa)
    {
        return Inertia::render('Tarefa/Edit', [
            'tarefa' => $tarefa, 
            'condominio'=> Condominio::all(), 
            'prestador' => PrestadorServico::all()
        ]);
    }

    public function update(Tarefa $tarefa, Request $request)
    {
        $tarefa->update($request->all());

        return redirect()->route('tarefas.index')->with('success','');
    }

    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        
        return redirect()->route('tarefas.index')->with('success','');
    }
}