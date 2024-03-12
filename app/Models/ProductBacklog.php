<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBacklog extends Model
{
    use HasFactory;
    protected $fillable = [
        'rol',
        'caracteristica',
        'razon',
        'prioridad',
    ];
    protected $table = 'product_backlogs';
}
