<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;

    protected $table = 'tarefas';

    protected $fillable = [
        'descricao',
        'condominio_id',
        'prestador_id',
        'data_manutencao',
        'prazo_meses',
        'prioridade',
        'status',
        'situacao',
        'repetir_em_meses',
        'observacoes',
        'created_by',
        'updated_by'
    ];

    public $timestamps = false;
}
