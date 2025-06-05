<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LogAlteracao extends Model
{
    use HasFactory;

    protected $table = 'log_alteracoes';

    protected $fillable = [
        'tabela_afetada',
        'registro_id',
        'operacao',
        'usuario_id',
        'data_hora',
        'dados_anteriores',
        'dados_novos',
    ];

    public $timestamps = false;

    const CREATED_AT = 'data_hora';

    protected $casts = [
        'dados_anteriores' => 'array',
        'dados_novos' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

}
