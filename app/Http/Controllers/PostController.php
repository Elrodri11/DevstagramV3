<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Constructor de la sesion
    public function __construct()
    {
        //Proteger el constructor con autenticacion
        $this->middleware('auth')->except(['index', 'show']);
    }

    //Para mostrar el muro de perfil
    public function index(User $user)
    {

        //Obtenemos los post de publicación del usuario
        $posts = Post::where('user_id', $user->id)->paginate(4);
  
        //Retornamos a la vista "dashboard"
        return view('dashboard',[
            //'posts' => $posts,
            'user' => $user,
            //Pasamos los Post de publicación a la vista dashboard
            'posts' => $posts
        ]);
    }

    //Crear metodo create para mostrar el formulario d publicacion
    public function create()
    {
        return view('post.create');
    }

    //Método para guardar imágenes
    public function store(Request $request) 
    {
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);

        //Guardar la información con relaciones (Modelo ER)
        // "post" es el noombre de la relación
        $request->user()->posts()->create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'imagen' => $request->imagen,
            'user_id' =>auth()->user()->id
        ]);

        //Redireccionar al muro principal después de guardar el Post de publicación
        return redirect()->route('post.index',  auth()->user()->username);
    }

    //Mostrar imagenes
    public function show(User $user, Post $post)
    {
        return view('post.show', [
            'post' => $post,
            'user' => $user
        ]);
    }
}