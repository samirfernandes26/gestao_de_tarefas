import { Link, router, usePage } from '@inertiajs/react';
import React from 'react';

// import {
//     PageContainer,
//     Header,
//     Table,
//     Thead,
//     Tbody,
//   } from './styles';
  

type Condominio = {
    id: number;
    nome: string;
};

type Prestador = {
    id: number;
    nome: string;
};

type Tarefa = {
    id: number;
    descricao: string;
    condominio: Condominio;
    data_manutencao: string;
    prazo_meses: number;
    prioridade: string;
    status: string;
};

interface Props {
    tarefas: Tarefa[];
}

export default function Index() {
    const { tarefas } = usePage().props;

    const excluir = (id: number) => {
        if (confirm('Deseja excluir essa tarefa?')) {
            router.delete(`/tarefas/${id}`);
        }
    };

    return (
        <div className="p-6">
            <div className="flex justify-between items-center mb-6">
                <h1 className="text-2xl font-bold">Tarefas</h1>
                <Link
                    href="/tarefas/create"
                    className="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
                >
                    Nova Tarefa
                </Link>
            </div>

            <div className="overflow-x-auto">
                <table className="min-w-full bg-white border rounded shadow-sm">
                    <thead className="bg-gray-100 text-left">
                        <tr>
                            <th className="p-3">Descrição</th>
                            <th className="p-3">Condomínio</th>
                            <th className="p-3">Data</th>
                            <th className="p-3">Prazo</th>
                            <th className="p-3">Prioridade</th>
                            <th className="p-3">Status</th>
                            <th className="p-3">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        {Array.isArray(tarefas) && tarefas.map((tarefa) => (
                            <tr key={tarefa.id} className="border-t">
                                <td className="p-3">{tarefa.descricao}</td>
                                <td className="p-3">{tarefa.condominio?.nome}</td>
                                <td className="p-3">{tarefa.data_manutencao}</td>
                                <td className="p-3">{tarefa.prazo_meses} meses</td>
                                <td className="p-3">{tarefa.prioridade}</td>
                                <td className="p-3">{tarefa.status}</td>
                                <td className="p-3 flex gap-2">
                                    <Link
                                        href={`/tarefas/${tarefa.id}/edit`}
                                        className="text-blue-600 hover:underline"
                                    >
                                        Editar
                                    </Link>
                                    <button
                                        onClick={() => excluir(tarefa.id)}
                                        className="text-red-600 hover:underline"
                                    >
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
}
