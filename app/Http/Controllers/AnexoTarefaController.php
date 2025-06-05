<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\AnexoTarefa;
use Illuminate\Support\Facades\Storage;

class AnexoTarefaController extends Controller
{
    /**
     * Lista todos os anexos das tarefas.
     */
    public function index()
    {
        $anexos = AnexoTarefa::with('tarefa', 'user')
            ->latest()
            ->get();

        return Inertia::render('AnexosTarefa/Index', [
            'anexos' => $anexos,
        ]);
    }

    /**
     * Armazena um novo anexo.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tarefa_id' => 'required|exists:tarefas,id',
            'arquivo' => 'required|file|max:10240',
            'enviado_por' => 'required|exists:users,id',
        ]);

        $arquivo = $request->file('arquivo');
        $path = $arquivo->store('anexos');

        AnexoTarefa::create([
            'tarefa_id' => $request->tarefa_id,
            'nome_arquivo' => $arquivo->getClientOriginalName(),
            'caminho_arquivo' => $path,
            'tipo_arquivo' => $arquivo->getClientMimeType(),
            'enviado_por' => $request->enviado_por,
        ]);

        return redirect()->back()->with('success', 'Arquivo anexado com sucesso!');
    }

    /**
     * Remove um anexo específico.
     */
    public function destroy(AnexoTarefa $anexo)
    {
        if (Storage::exists($anexo->caminho_arquivo)) {
            Storage::delete($anexo->caminho_arquivo);
        }

        $anexo->delete();

        return redirect()->back()->with('success', 'Anexo removido com sucesso.');
    }
}
