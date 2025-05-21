<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $fillable = [
        'nome',
        'endereco',
        'responsavel',
        'contato',
    ];
}
