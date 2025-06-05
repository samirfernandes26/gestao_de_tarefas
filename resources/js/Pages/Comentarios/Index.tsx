import { router, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type Comentario = {
    id: number;
    comentario: string;
    tarefa_id: number;
    usuario_id: number;
    tarefa?: { descricao: string };
    usuario?: { name: string };
};

export default function Index() {
    const { comentarios } = usePage().props as unknown as {
        comentarios: Comentario[];
    };

    const excluir = (comentario: Comentario) => {
        if (confirm('Deseja excluir este comentário?')) {
            router.delete(route('comentarios.destroy', comentario));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Comentários de Tarefas</h1>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Comentário</th>
                        <th>Tarefa</th>
                        <th>Usuário</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {comentarios.map((c) => (
                        <tr key={c.id}>
                            <td>{c.comentario}</td>
                            <td>{c.tarefa?.descricao || c.tarefa_id}</td>
                            <td>{c.usuario?.name || c.usuario_id}</td>
                            <td>
                                <button onClick={() => excluir(c)}>
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
