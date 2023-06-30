<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Alumno;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    //mostramos los alumnos
    public function index()
    {
        $alumnos = Alumno::all();
        $grupos = Grupo::all();
        return view('alumnos', ['alumnos' => $alumnos, 'grupos' => $grupos]);
    }

    //metodo para guardar los alumnos
    public function store(Request $request)
    {
        //Validamos los datos
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'grupo_id' => 'required'
        ]);

        //Guardamos los datos en la BD
        Alumno::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'grupo_id' => $request->grupo_id
        ]);

        //Redireccionamos a la vista de alumnos
        return redirect()->route('alumnos');
    }
}