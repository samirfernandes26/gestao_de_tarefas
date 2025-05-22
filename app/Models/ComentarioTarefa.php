<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
