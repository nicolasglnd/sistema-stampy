@extends('layouts.app')

@section('titulo', 'pantallas')
@section('cabecera', 'pantallas')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('pantallasserigraficas.create') }}" class="btn btn-outline">Nuevo pantalla</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div id="index-pantalla" class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($pantallas as $pantalla)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $pantalla->nombre }}</h2>
                    <p><strong>ID: </strong><span>{{ $pantalla->id }}</span></p>
                    <p><strong>ID pantalla fisica: </strong><span>{{ $pantalla->id_pantalla_fisica }}</span></p>
                    <p><strong>Constancia Eliminación: </strong><span>{{ $pantalla->constancia_eliminacion }}</span></p>
                    <p><strong>Dibujo: </strong><a href="{{ asset('dibujos/' - $pantalla->ruta_dibujo) }} " download>descargar</a></p>
                    <p><strong>Imagen Original: </strong><a href="{{ asset('imagenes-original/' . $pantalla->ruta_imagen_original) }} " download>descargar</a></p>
                    <p><strong>Usuario encargado: </strong><span>{{ $pantalla->user->name }}</span></p>
                    <p><strong>ID Orden de trabajo: </strong><span>{{ $pantalla->id_orden_trabajo }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('pantallasserigraficas.edit', $pantalla->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('pantallasserigraficas.destroy', $pantalla->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline- btn-xs">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection