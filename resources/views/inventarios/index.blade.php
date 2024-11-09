@extends('layouts.app')

@section('titulo', 'Pagina Principal')

@section('contenido')

    <div id="index-inventario" class="flex flex-wrap justify-center">

        @foreach($inventarios as $inventario)
            <div class="card bg-primary text-primary-content w-96 m-4 p-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $inventario->nombre }}</h2>
                    <p><strong>Cantidad: </strong><span>{{ $inventario->cantidad }}</span></p>
                    <p><strong>Medida: </strong><span>{{ $inventario->medida }}</span></p>
                    <p><strong>ID: </strong><span>{{ $inventario->id }}</span></p>
                    <div class="card-actions justify-end">
                        <button class="btn">Seleccionar</button>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

@endsection