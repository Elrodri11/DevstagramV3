<?php

namespace App\Models;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grupo extends Model
{
    use HasFactory;

    //Protegemos la información para guardarla en la BD
    protected $fillable=[
        'grupo'
    ];

    //Crear un método para la relación
    public function grupos()
    {
        //Un grupo tiene muchos alumnos (1:N)
        return $this->hasMany(Alumno::class);
    }
}