<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\PrestadorServico;

class PrestadorServicoController extends Controller
{
    public function index()
    {
        $prestadores = PrestadorServico::all();
        return Inertia::render('Prestadores/Index', compact('prestadores'));
    }

    public function create()
    {
        return Inertia::render('Prestadores/Create');
    }

    public function store(Request $request)
    {
        PrestadorServico::create($request->validate([
            'nome' => 'required|string|max:255',
            'area_atuacao' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:255',
            'observacoes' => 'nullable|string',
        ]));

        return redirect()->route('prestadores.index');
    }

    public function edit(PrestadorServico $prestador)
    {
        return Inertia::render('Prestadores/Edit', [
            'prestador' => $prestador
        ]);
    }

    public function update(Request $request, PrestadorServico $prestador)
    {
        $prestador->update($request->validate([
            'nome' => 'required|string|max:255',
            'area_atuacao' => 'nullable|string|max:255',
            'contato' => 'nullable|string|max:255',
            'observacoes' => 'nullable|string',
        ]));

        return redirect()->route('prestadores.index');
    }

    public function destroy(PrestadorServico $prestador)
    {
        $prestador->delete();
        return redirect()->route('prestadores.index');
    }
}
