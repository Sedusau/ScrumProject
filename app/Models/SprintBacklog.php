<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SprintBacklog extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'tiempo_programado', 'objetivo', 'fecha_inicio', 'fecha_finalizacion'];
    protected $table = 'sprint_backlogs';

    public function tareas()
    {
        return $this->hasMany(TareaSprint::class);
    }

}
