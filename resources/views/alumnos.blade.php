@extends('layouts.app')
@section('titulo')
    Registro de alumnos
@endsection
@section('contenido')
        
<div class="container mx-auto">
    <!-- Formulario para agregar alumnos -->
    <form action="{{route('alumnos')}}" method="POST" novalidate class="mb-8">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block font-bold">Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Nombre" class="border border-gray-300 px-3 py-2 w-full rounded focus:outline-none focus:border-blue-500 @error('nombre') border-red-500 @enderror" value="{{old('nombre')}}" />
            @error('nombre')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="apellido" class="block font-bold">Apellido</label>
            <input id="apellido" name="apellido" type="text" placeholder="Apellido" class="border border-gray-300 px-3 py-2 w-full rounded focus:outline-none focus:border-blue-500 @error('apellido') border-red-500 @enderror" value="{{old('apellido')}}" />
            @error('apellido')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="fecha_nacimiento" class="block font-bold">Fecha de nacimiento</label>
            <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento" class="border border-gray-300 px-3 py-2 w-full rounded focus:outline-none focus:border-blue-500 @error('fecha_nacimiento') border-red-500 @enderror" value="{{old('fecha_nacimiento')}}" />
            @error('fecha_nacimiento')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="grupo_id" class="block font-bold">Grupo</label>
            <select id="grupo_id" name="grupo_id" class="border border-gray-300 px-3 py-2 w-full rounded focus:outline-none focus:border-blue-500 @error('grupo_id') border-red-500 @enderror">
                <option value="">Seleccione el grupo</option>
                <!-- Iterar sobre la lista de grupos -->
                @foreach ($grupos as $grupo)
                <option value="{{$grupo->id}}">{{$grupo->grupo}}</option>
                @endforeach
            </select>
            @error('grupo_id')
            <p class="text-red-500 text-sm mt-1">{{$message}}</p>
            @enderror
        </div>

        <input type="submit" value="Registrar alumno" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rownded-lg"/>

    </form>

    <!-- Tabla para mostrar los alumnos -->
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200">ID</th>
                <th class="px-4 py-2 bg-gray-200">Nombre</th>
                <th class="px-4 py-2 bg-gray-200">Apellidos</th>
                <th class="px-4 py-2 bg-gray-200">Fecha de nacimiento</th>
                <th class="px-4 py-2 bg-gray-200">Grupo</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre la lista de alumnos -->
            @foreach ($alumnos as $alumno)
            <tr>
                <td class="border-b border-r px-4 py-2">{{$alumno->id}}</td>
                <td class="border-b border-r px-4 py-2">{{$alumno->nombre}}</td>
                <td class="border-b border-r px-4 py-2">{{$alumno->apellido}}</td>
                <td class="border-b border-r px-4 py-2">{{$alumno->fecha_nacimiento}}</td>
                <!-- Buscar el grupo correspondiente al alumno -->
                @foreach ($grupos as $grupo)
                    @if ($grupo->id == $alumno->grupo_id)
                    <td class="border-b border-r px-4 py-2">{{$grupo->grupo}}</td>
                    @endif
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>



@endsection