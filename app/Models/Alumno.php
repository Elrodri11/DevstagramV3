<?php

namespace App\Models;

use App\Models\Grupo;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alumno extends Model
{
    use HasFactory;

    //Protegemos la información para guardarla en la BD
    protected $fillable=[
        'nombre',
        'apellido',
        'fecha_nacimiento',
        'grupo_id'
    ];

    //Creamos la relacion con grupos
    public function grupos()
    {
        // Un alumno pertenece a un grupo (N:1)
        return $this->belongsTo(Grupo::class);
    }
}