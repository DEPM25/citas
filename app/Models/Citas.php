<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;

    static $rules = [
        'documento' => 'required',
        'nombre' => 'required',
        'apellido' => 'required',
        'mascota' => 'required',
        'start' => 'required',
        'end' => 'required',
        'hora' => 'required',
    ];

    protected $fillable = ['documento', 'nombre', 'apellido', 'mascota', 'start', 'end', 'hora'];
}
