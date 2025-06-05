<?php

namespace App\Http\Controllers;

use App\Models\ComentarioTarefa;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ComentarioTarefaController extends Controller
{
    public function index()
    {
        $comentarios = ComentarioTarefa::with(['tarefa', 'user'])->orderByDesc('id')->get();

        return Inertia::render('Comentarios/Index', [
            'comentarios' => $comentarios
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tarefa_id' => 'required|exists:tarefas,id',
            'usuario_id' => 'required|exists:users,id',
            'comentario' => 'required|string|max:1000',
        ]);

        ComentarioTarefa::create($validated);

        return redirect()->back()->with('success', 'Comentário adicionado com sucesso!');
    }

    public function destroy(ComentarioTarefa $comentario)
    {
        $comentario->delete();

        return redirect()->back()->with('success', 'Comentário removido com sucesso.');
    }
}
