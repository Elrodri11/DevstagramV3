<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use Illuminate\Http\Request;

class GruposController extends Controller
{
    //mostramos los grupos
    public function index()
    {
        $grupos = Grupo::all();
        return view('grupos', ['grupos' => $grupos]);
    }

    //metodo para guardar los grupos
    public function store(Request $request)
    {
        //Validamos los datos
        $request->validate([
            'grupo' => 'required'
        ]);

        //Guardamos los datos en la BD
        Grupo::create([
            'grupo' => $request->grupo
        ]);

        //Redireccionamos a la vista de grupos
        return redirect()->route('grupos');
    }

}