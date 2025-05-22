<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ComentarioTarefa extends Model
{
    use HasFactory;

    protected $table = 'comentarios_tarefa';

    protected $fillable = [
        'tarefa_id',
        'usuario_id',
        'comentario'
    ];

    public $timestamps = false;


}
