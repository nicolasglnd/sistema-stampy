@extends('layouts.app')

@section('titulo', 'Crear Costo Final')
@section('cabecera', 'Crear Costo Final')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('costosfinales.store') }}" method="POST">
                    @csrf
                    <div id="form-costo">

                        <div class="form-control">
                            <label class="label" for="id">
                                <span class="label-text">Selecciona un cliente</span>
                            </label>
                            <select name="id" class="input input-bordered">
                                    <option value="" disabled selected>Selecciona una Orden de Trabajo</option>
                                @foreach($ordenes as $orden)
                                    @php
                                        $primerNombre = $orden->cliente->persona->primer_nombre;
                                        $segundoNombre = $orden->cliente->persona->segundo_nombre;
                                        $primerApellido = $orden->cliente->persona->primer_apellido;
                                        $segundoApellido = $orden->cliente->persona->segundo_apellido;
                                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                                        $titulo = $orden->cliente->entidad ? $orden->cliente->entidad : $nombreCompleto;
                                        $ordenId = $orden->id;
                                        $primerLogotipo= $orden->trabajos->first() ? $orden->trabajos->first()->logotipo : 'Sin logotipo';
                                    @endphp
                                    <option value="{{ $ordenId }}">{{ $ordenId . ' - ' . $titulo . ' - ' . $primerLogotipo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label" for="cantidad_dibujos">
                                <span class="label-text">Cantidad Dibujos</span>
                            </label>
                            <input type="number" name="cantidad_dibujos" placeholder="Cantidad de dibujos" class="input input-bordered" />
                        </div>

                        <div class="form-control">
                            <label class="label" for="costo_dibujos">
                                <span class="label-text">Costo de Dibujos</span>
                            </label>
                            <input type="number" name="costo_dibujos" placeholder="Costo de dibujos" class="input input-bordered" />
                        </div>

                        <div class="form-control">
                            <label class="label" for="costo_grabados">
                                <span class="label-text">Costo de grabados</span>
                            </label>
                            <input type="number" name="costo_grabados" placeholder="Costo de dibujos" class="input input-bordered" />
                        </div>

                        <div class="form-control">
                            <label class="label" for="costo_estampados">
                                <span class="label-text">Costo de estampados</span>
                            </label>
                            <input type="number" name="costo_estampados" placeholder="Costo de estampados" class="input input-bordered" />
                        </div>

                        <div class="form-control">
                            <label class="label" for="costo_total">
                                <span class="label-text">Costo Total</span>
                            </label>
                            <input type="number" name="costo_total" placeholder="Costo Total" class="input input-bordered" />
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection