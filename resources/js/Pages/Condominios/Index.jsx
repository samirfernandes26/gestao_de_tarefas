import React from 'react';
import { Link, useForm } from '@inertiajs/react';

export default function Index({ condominios }) {
  const { delete: destroy } = useForm();

  const handleDelete = (id) => {
    if (confirm('Tem certeza que deseja excluir este condomínio?')) {
      destroy(route('condominios.destroy', id));
    }
  };

  return (
    <div className="p-8">
      <h1 className="text-2xl font-bold mb-4">Lista de Condomínios</h1>

      <Link
        href={route('condominios.create')}
        className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 mb-4 inline-block"
      >
        + Novo Condomínio
      </Link>

      <table className="min-w-full border mt-4">
        <thead>
          <tr className="bg-gray-100 text-left">
            <th className="border p-2">Nome</th>
            <th className="border p-2">Endereço</th>
            <th className="border p-2">Responsável</th>
            <th className="border p-2">Contato</th>
            <th className="border p-2">Ações</th>
          </tr>
        </thead>
        <tbody>
          {condominios.length === 0 ? (
            <tr>
              <td colSpan="5" className="text-center p-4">Nenhum condomínio encontrado.</td>
            </tr>
          ) : (
            condominios.map((condominio) => (
              <tr key={condominio.id}>
                <td className="border p-2">{condominio.nome}</td>
                <td className="border p-2">{condominio.endereco}</td>
                <td className="border p-2">{condominio.responsavel}</td>
                <td className="border p-2">{condominio.contato}</td>
                <td className="border p-2 space-x-2">
                  <Link
                    href={route('condominios.edit', condominio.id)}
                    className="text-blue-500 hover:underline"
                  >
                    Editar
                  </Link>
                  <button
                    onClick={() => handleDelete(condominio.id)}
                    className="text-red-500 hover:underline"
                  >
                    Excluir
                  </button>
                </td>
              </tr>
            ))
          )}
        </tbody>
      </table>
    </div>
  );
}
