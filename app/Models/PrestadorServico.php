<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrestadorServico extends Model
{
    use HasFactory;

    protected $table = 'prestadores_servico';
    protected $fillable = [
        'nome',
        'area_atuacao',
        'contato',
        'observacoes',
        'created_by',
        'updated_by'
    ];

    public $timestamps = false;
}
