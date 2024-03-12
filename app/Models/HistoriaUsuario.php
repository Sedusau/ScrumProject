<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriaUsuario extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'prioridad',
        'programador',
        'como',
        'quiero',
        'para',
        'descripcion',
        'observaciones',
        'criterioaceptacion',
        'sentimiento',

    ];
    protected $table = 'historia_usuarios';
}
