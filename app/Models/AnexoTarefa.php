<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnexoTarefa extends Model
{
    use HasFactory;

    protected $table = 'anexos_tarefa';

    protected $fillable = [
        'tarefa_id',
        'nome_arquivo',
        'caminho_arquivo',
        'tipo_arquivo',
        'enviado_por',
    ];

    public $timestamps = false;
}
