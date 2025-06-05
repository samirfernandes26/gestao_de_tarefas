import { Link, router, usePage } from '@inertiajs/react';
import { Header, PageContainer, Table, Tbody, Thead } from './styles';

type Prestador = {
    id: number;
    nome: string;
    area_atuacao: string;
    contato: string;
    observacoes: string;
};

export default function Index() {
    const { prestadores } = usePage().props as unknown as {
        prestadores: Prestador[];
    };

    const excluir = (prestador: Prestador) => {
        if (confirm(`Deseja excluir o prestador "${prestador.nome}"?`)) {
            router.delete(route('prestadores.destroy', prestador));
        }
    };

    return (
        <PageContainer>
            <Header>
                <h1>Prestadores de Serviço</h1>
                <Link href="/prestadores/create">Novo Prestador</Link>
            </Header>

            <Table>
                <Thead>
                    <tr>
                        <th>Nome</th>
                        <th>Área de Atuação</th>
                        <th>Contato</th>
                        <th>Observações</th>
                        <th>Ações</th>
                    </tr>
                </Thead>
                <Tbody>
                    {Array.isArray(prestadores) &&
                        prestadores.map((prestador) => (
                            <tr key={prestador.id}>
                                <td>{prestador.nome}</td>
                                <td>{prestador.area_atuacao}</td>
                                <td>{prestador.contato}</td>
                                <td>{prestador.observacoes}</td>
                                <td>
                                    <Link
                                        href={`/prestadores/${prestador.id}/edit`}
                                    >
                                        Editar
                                    </Link>
                                    <button onClick={() => excluir(prestador)}>
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
