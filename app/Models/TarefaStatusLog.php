<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Tarefa;
use App\Models\User;

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

    public function tarefa()
    {
        return $this->belongsTo(Tarefa::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'alterado_por');
    }
}
