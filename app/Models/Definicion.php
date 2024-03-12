<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Definicion extends Model
{
    use HasFactory;
 

    protected $primaryKey = 'id';
    protected $fillable = [
        'tarea',
        'usuario_id',
   
    ];
    protected $table = 'definicions';

    public function user(){
        return $this->belongsTo(User::class,'usuario_id');

    }
}
