<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class CondominioController extends Controller
{
    public function index()
    {
        $condominios = Condominio::all();
        return Inertia::render('Condominios/Index', [
            'condominios' => $condominios
        ]);
    }

    public function create()
    {
        return Inertia::render('Condominios/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'responsavel' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:255',
        ]);

        Condominio::create([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'responsavel' => $request->responsavel,
            'contato' => $request->contato,
            'created_by' => Auth::id(),
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('condominios.index')->with('success', 'Condomínio criado com sucesso.');
    }

    public function edit(Condominio $condominio)
    {
        return Inertia::render('Condominios/Edit', [
            'condominio' => $condominio
        ]);
    }

    public function update(Request $request, Condominio $condominio)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'endereco' => 'required|string|max:255',
            'responsavel' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:255',
        ]);

        $condominio->update([
            'nome' => $request->nome,
            'endereco' => $request->endereco,
            'responsavel' => $request->responsavel,
            'contato' => $request->contato,
            'updated_by' => Auth::id(),
        ]);

        return redirect()->route('condominios.index')->with('success', 'Condomínio atualizado com sucesso.');
    }

    public function destroy(Condominio $condominio)
    {
        $condominio->delete();

        return redirect()->route('condominios.index')->with('success', 'Condomínio removido.');
    }
}
