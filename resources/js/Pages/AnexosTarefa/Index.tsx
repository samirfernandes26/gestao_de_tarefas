import { router, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type Anexo = {
    id: number;
    nome_arquivo: string;
    caminho_arquivo: string;
    tipo_arquivo: string;
    tarefa_id: number;
    enviado_por: number;
};

export default function Index() {
    const { anexos } = usePage().props as unknown as { anexos: Anexo[] };

    const excluir = (anexo: Anexo) => {
        if (confirm(`Deseja excluir o anexo "${anexo.nome_arquivo}"?`)) {
            router.delete(route('anexos.destroy', anexo));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Anexos das Tarefas</h1>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Arquivo</th>
                        <th>Tipo</th>
                        <th>Tarefa</th>
                        <th>Enviado por</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {Array.isArray(anexos) &&
                        anexos.map((anexo) => (
                            <tr key={anexo.id}>
                                <td>
                                    <a
                                        href={`/storage/${anexo.caminho_arquivo}`}
                                        target="_blank"
                                        rel="noopener noreferrer"
                                    >
                                        {anexo.nome_arquivo}
                                    </a>
                                </td>
                                <td>{anexo.tipo_arquivo}</td>
                                <td>{anexo.tarefa_id}</td>
                                <td>{anexo.enviado_por}</td>
                                <td>
                                    <button onClick={() => excluir(anexo)}>
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
