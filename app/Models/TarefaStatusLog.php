<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TarefaStatusLog extends Model
{
    use HasFactory;

    protected $table = 'tarefa_status_log';

    protected $fillable = [
        'tarefa_id',
        'status_anterior',
        'status_novo',
        'alterado_por',
        'alterado_em',
    ];

    public $timestamps = false;
}
