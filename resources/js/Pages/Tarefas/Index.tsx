import { Link, router, usePage } from '@inertiajs/react';

import { Header, PageContainer, Table, Tbody, Thead } from './styles';

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

    const excluir = (tarefa: Tarefa) => {
        if (confirm('Deseja excluir essa tarefa?')) {
            router.delete(route('tarefas.destroy', tarefa));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Tarefas</h1>
                <Link href="/tarefas/create">Nova Tarefa</Link>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Condomínio</th>
                        <th>Data</th>
                        <th>Prazo</th>
                        <th>Prioridade</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {Array.isArray(tarefas) &&
                        tarefas.map((tarefa) => (
                            <tr key={tarefa.id}>
                                <td>{tarefa.descricao}</td>
                                <td>{tarefa.condominio?.nome}</td>
                                <td>{tarefa.data_manutencao}</td>
                                <td>{tarefa.prazo_meses} meses</td>
                                <td
                                    className={`prioridade ${tarefa.prioridade.toLowerCase()}`}
                                >
                                    {tarefa.prioridade}{' '}
                                </td>
                                <td>{tarefa.status}</td>
                                <td>
                                    <Link href={`/tarefas/${tarefa.id}/edit`}>
                                        Editar
                                    </Link>
                                    <button onClick={() => excluir(tarefa)}>
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        ))}
                </Tbody>
            </Table>
        </PageContainer>
    );
}
