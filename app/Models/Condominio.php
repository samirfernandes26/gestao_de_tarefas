<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condominio extends Model
{
    use HasFactory;

    protected $table = 'condominios';
    
    protected $fillable = [
        'nome',
        'endereco',
        'responsavel',
        'contato',
        'created_by',
        'updated_by'
    ];
    public $timestamps = false;

    public function tarefas()
    {
        return $this->hasMany(Tarefa::class);
    }
}
