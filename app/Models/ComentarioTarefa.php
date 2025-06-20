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

     public function tarefa()
    {
        return $this->belongsTo(Tarefa::class, 'tarefa_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
