<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamo extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'descripcion',
        'categoria',
        'latitud',
        'longitud',
        'user_id',
    ];
}
