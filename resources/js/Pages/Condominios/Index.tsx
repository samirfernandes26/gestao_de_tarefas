import React from 'react';
import { Link, usePage, router } from '@inertiajs/react';
import { PageContainer, Header } from './styles';

type Condominio = {
  id: number;
  nome: string;
  endereco: string;
  responsavel: string;
  contato: string;
};

export default function Index() {
  const { condominios } = usePage().props as unknown as { condominios: Condominio[] };

  const excluir = (id: number) => {
    if (confirm('Deseja excluir este condomínio?')) {
      router.delete(`/condominios/${id}`);
    }
  };

  return (
    <PageContainer>
      <Header>
        <h1>Condomínios</h1>
        <Link href="/condominios/create">Novo Condomínio</Link>
      </Header>

      <table className="w-full border-collapse rounded bg-[#1a1c24]">
        <thead className="bg-[#20232b]">
          <tr>
            <th className="p-3 text-left text-blue-400">Nome</th>
            <th className="p-3 text-left text-blue-400">Endereço</th>
            <th className="p-3 text-left text-blue-400">Responsável</th>
            <th className="p-3 text-left text-blue-400">Contato</th>
            <th className="p-3 text-left text-blue-400">Ações</th>
          </tr>
        </thead>
        <tbody>
          {condominios.map((condominio) => (
            <tr key={condominio.id} className="hover:bg-[#2a2e38] transition">
              <td className="p-3">{condominio.nome}</td>
              <td className="p-3">{condominio.endereco}</td>
              <td className="p-3">{condominio.responsavel}</td>
              <td className="p-3">{condominio.contato}</td>
              <td className="p-3 flex gap-3">
                <Link href={`/condominios/${condominio.id}/edit`} className="text-blue-400 hover:underline">Editar</Link>
                <button onClick={() => excluir(condominio.id)} className="text-red-400 hover:underline">Excluir</button>
              </td>
            </tr>
          ))}
        </tbody>
      </table>
    </PageContainer>
  );
}
