<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareaSprint extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    protected $table = 'tarea_sprints';



    public function sprintBacklog()
    {
        return $this->belongsTo(SprintBacklog::class);
    }
}
