<?php

namespace App\Http\Controllers;

use App\Models\Condominio;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CondominioController extends Controller
{
    //listar todos os condominios
    public function index()
    {
        $condominios = Condominio::all();

        return Inertia::render('Condominios/Index', [
            'condominios' => $condominios
        ]);
    }

    //Mostrar o formulário de criação
    public function create()
    {
        return Inertia::render('Condominios/Create');
    }


    //Salva no banco o condominio
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'responsavel' => 'required|string',
            'contato' => 'required|strig',
        ]);

        Condominio::create($request->all());

        return redirect()->route('condominios.index')->with('success', '');
    }

    //Visualizar o formulário de condomínios
    public function show(Condominio $condominio)
    {
        return Inertia::render('Condominios/show');
    }

    //Mostra o formulário para a edição
    public function edit(Condominio $condominio)
    {
        return Inertia::render('Condominios/Edit', [
            'condominio' => $condominio
        ]);
    }

    //Atualizar no banco um condomínio
    public function update(Request $request, Condominio $condominio)
    {
        $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'responsavel' => 'required|string',
            'contato' => 'required|string',
        ]);

        $condominio->update($request->all());

        return redirect()->route('condominios.index')->with('success', '');
    }

    //Deletar no banco um condominio
    public function destroy(Condominio $condominio)
    {
        $condominio->delete();

        return redirect(route('condominios.index'))->with('success', '');
    }
}
