import { Link, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type User = {
    id: number;
    name: string;
};

type Log = {
    id: number;
    tabela_afetada: string;
    registro_id: number;
    operacao: string;
    data_hora: string;
    dados_anteriores: Record<string, any>;
    dados_novos: Record<string, any>;
    user?: User;
};

export default function Index() {
    const { logs } = usePage().props as unknown as { logs: Log[] };

    return (
        <PageContainer>
            <Header>
                <h1>Logs de Alterações</h1>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Tabela</th>
                        <th>ID do Registro</th>
                        <th>Operação</th>
                        <th>Usuário</th>
                        <th>Data</th>
                        <th>Visualizar</th>
                    </tr>
                </Thead>
                <Tbody>
                    {logs.map((log) => (
                        <tr key={log.id}>
                            <td>{log.tabela_afetada}</td>
                            <td>{log.registro_id}</td>
                            <td>{log.operacao}</td>
                            <td>{log.user?.name ?? '-'}</td>
                            <td>
                                {new Date(log.data_hora).toLocaleString(
                                    'pt-BR',
                                )}
                            </td>
                            <td>
                                <Link
                                    href={route('logs-alteracoes.show', log.id)}
                                >
                                    Detalhes
                                </Link>
                            </td>
                        </tr>
                    ))}
                </Tbody>
            </Table>
        </PageContainer>
    );
}
