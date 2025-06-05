// resources/js/Pages/TarefaStatusLogs/Index.tsx
import { router, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type User = {
    id: number;
    name: string;
};

type Tarefa = {
    id: number;
    descricao: string;
};

type Log = {
    id: number;
    tarefa: Tarefa;
    status_anterior: string;
    status_novo: string;
    user: User;
    alterado_em: string;
};

export default function Index() {
    const { logs } = usePage().props as unknown as { logs: Log[] };

    const excluir = (log: Log) => {
        if (
            confirm(`Deseja excluir o log da tarefa "${log.tarefa.descricao}"?`)
        ) {
            router.delete(route('tarefa-status-logs.destroy', log.id));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Histórico de Status</h1>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Tarefa</th>
                        <th>Status Anterior</th>
                        <th>Status Novo</th>
                        <th>Alterado por</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {logs.map((log) => (
                        <tr key={log.id}>
                            <td>{log.tarefa?.descricao}</td>
                            <td>{log.status_anterior || '-'}</td>
                            <td>{log.status_novo}</td>
                            <td>{log.user?.name}</td>
                            <td>
                                {new Date(log.alterado_em).toLocaleString(
                                    'pt-BR',
                                )}
                            </td>
                            <td>
                                <button onClick={() => excluir(log)}>
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
