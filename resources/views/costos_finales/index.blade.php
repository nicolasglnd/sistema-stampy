@extends('layouts.app')

@section('titulo', 'Costos Finales')
@section('cabecera', 'Costos Finales')

@section('contenido')

    {{-- boton crear --}}
    <div class="flex justify-end m-4">
        <a href="{{ route('costosfinales.create') }}" class="btn btn-outline">Nuevo Costo Final</a>
    </div>

    {{-- grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 m-6 --}}
    <div class="flex flex-wrap justify-center gap-4 m-4 ">

        @foreach($costos as $costo)
            <div class="card bg-primary text-primary-content w-96 shadow-x1 m-8 p-4 card-normal-size">
                <div class="card-body">
                    @php
                        $primerNombre = $costo->cliente->persona->primer_nombre;
                        $segundoNombre = $costo->cliente->persona->segundo_nombre;
                        $primerApellido = $costo->cliente->persona->primer_apellido;
                        $segundoApellido = $costo->cliente->persona->segundo_apellido;
                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                        $clienteNombre = $costo->cliente->entidad ? $costo->cliente->entidad : $nombreCompleto;

                        $costoDibujos = $costo->costo_dibujos;
                        $costoGrabados = $costo->costo_grabados;
                        $costoEstampados = $costo->costo_estampados;
                    @endphp
                    <h2 class="card-title">{{ $clienteNombre }}</h2>
                    <p><strong>ID: </strong><span>{{ $costo->id }}</span></p>
                    <p><strong>Cantidad de Dibujos: </strong><span>{{ $costo->cantidad_dibujos }}</span></p>
                    <p><strong>Cantidad de Prendas: </strong><span>{{ $costo->ordentrabajo->total_cantidad_prendas }}</span></p>
                    <p><strong>Cantidad de Estampados: </strong><span>{{ $costo->ordentrabajo->total_cantidad_estampados }}</span></p>
                    <p><strong>Costo Dibujos: </strong><span>{{ $costoDibujos }}</span></p>
                    <p><strong>Costo Grabados: </strong><span>{{ $costoGrabados }}</span></p>
                    <p><strong>Costo Estampados: </strong><span>{{ $costoEstampados }}</span></p>
                    <p><strong>Costo Total: </strong><span>{{ $costo->costo_total }}</span></p>
                    <p><strong>Cliente: </strong><span>{{ $clienteNombre }}</span></p>
                    <p><strong>ID del cliente: </strong><span>{{ $costo->id_cliente }}</span></p>
                    <p><strong>Documento de Identificación: </strong><span>{{ $costo->cliente->persona->documento_id }}</span></p>
                    <p><strong>Descripción Orden: </strong><span>{{ $costo->ordentrabajo->descripcion }}</span></p>
                    <div class="card-actions justify-end">
                        <a href="{{ route('costosfinales.edit', $costo->id) }}" class="btn btn-outline btn-xs">Editar</a>
                        <form action="{{ route('costosfinales.destroy', $costo->id) }}" method="POST">
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
