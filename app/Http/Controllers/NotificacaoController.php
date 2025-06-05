<?php

namespace App\Http\Controllers;

use App\Models\Notificacao;
use Inertia\Inertia;

class NotificacaoController extends Controller
{
    /**
     * Lista todas as notificações.
     */
    public function index()
    {
        $notificacoes = Notificacao::with('user')->orderByDesc('id')->get();

        return Inertia::render('Notificacoes/Index', [
            'notificacoes' => $notificacoes,
        ]);
    }

    /**
     * Marca uma notificação como lida.
     */
    public function update(Notificacao $notificacao)
    {
        $notificacao->update(['lida' => true]);

        return redirect()->back()->with('success', 'Notificação marcada como lida.');
    }

    /**
     * Remove uma notificação.
     */
    public function destroy(Notificacao $notificacao)
    {
        $notificacao->delete();

        return redirect()->back()->with('success', 'Notificação removida.');
    }
}
