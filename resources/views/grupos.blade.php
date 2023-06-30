@extends('layouts.app')

@section('titulo')
    Registro de grupos
@endsection

@section('contenido')
<form action="{{route('grupos')}}" method="POST" novalidate class="mb-8">
    @csrf
    <div class="mb-5">
        <label for="grupo" class="block font-bold">Nombre del grupo</label>
        <input id="grupo" name="grupo" type="text" placeholder="Nombre del grupo" class="border border-gray-300 px-3 py-2 w-full rounded focus:outline-none focus:border-blue-500 @error('grupo') border-red-500 @enderror" value="{{old('grupo')}}" />
        @error('grupo')
        <p class="text-red-500 text-sm mt-1">{{$message}}</p>
        @enderror
    </div>

    <input type="submit" value="Registrar grupo" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rownded-lg"/>
</form>

<!-- Tabla para mostrar los grupos -->
<div class="container mx-auto">
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200">ID</th>
                <th class="px-4 py-2 bg-gray-200">Nombre del grupo</th>
            </tr>
        </thead>
        <tbody>
            <!-- Iterar sobre la lista de grupos -->
            @foreach ($grupos as $grupo)
            <tr class="text-gray-700 dark:text-gray-400 border-b border-black">
                <td class="px-4 py-3 border-r border-black">{{$grupo->id}}</td>
                <td class="px-4 py-3 border-r border-black">{{$grupo->grupo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
