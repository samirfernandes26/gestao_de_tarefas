import { router, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type User = {
    id: number;
    name: string;
};

type Notificacao = {
    id: number;
    titulo: string;
    mensagem: string;
    lida: boolean;
    user?: User;
};

export default function Index() {
    const { notificacoes } = usePage().props as unknown as { notificacoes: Notificacao[] };

    const marcarComoLida = (notificacao: Notificacao) => {
        router.put(route('notificacoes.update', notificacao.id));
    };

    const excluir = (notificacao: Notificacao) => {
        if (confirm('Deseja excluir esta notificação?')) {
            router.delete(route('notificacoes.destroy', notificacao.id));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Notificações</h1>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Título</th>
                        <th>Mensagem</th>
                        <th>Usuário</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {notificacoes.map((n) => (
                        <tr key={n.id} className={!n.lida ? 'unread' : ''}>
                            <td>{n.titulo}</td>
                            <td>{n.mensagem}</td>
                            <td>{n.user?.name ?? '-'}</td>
                            <td>{n.lida ? 'Lida' : 'Não lida'}</td>
                            <td>
                                {!n.lida && (
                                    <button onClick={() => marcarComoLida(n)}>
                                        Marcar como lida
                                    </button>
                                )}
                                <button
                                    className="danger"
                                    onClick={() => excluir(n)}
                                >
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
