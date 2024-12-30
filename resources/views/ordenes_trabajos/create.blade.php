@extends('layouts.app')

@section('titulo', 'Crear Orden de Trabajo')
@section('cabecera', 'Crear Orden de Trabajo')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('ordenestrabajos.store') }}" method="POST">
                    @csrf
                    <div id="form-orden">
                        <div class="form-control">
                            <label class="label" for="total_cantidad_estampados">
                                <span class="label-text">Cantidad total de estampados</span>
                            </label>
                            <input type="number" name="total_cantidad_estampados" placeholder="Total estampados" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label" for="total_cantidad_prendas">
                                <span class="label-text">Cantidad total de prendas</span>
                            </label>
                            <input type="number" name="total_cantidad_prendas" placeholder="Total de prendas" class="input input-bordered" required />
                        </div>

                        <div class="form-control">
                            <label class="label" for="id_cliente">
                                <span class="label-text">Selecciona un cliente</span>
                            </label>
                            <select name="id_cliente" class="input input-bordered">
                                    <option value="" disabled selected>Seleccionar cliente</option>
                                @foreach($clientes as $cliente)
                                    @php
                                        $primerNombre = $cliente->persona->primer_nombre;
                                        $segundoNombre = $cliente->persona->segundo_nombre;
                                        $primerApellido = $cliente->persona->primer_apellido;
                                        $segundoApellido = $cliente->persona->segundo_apellido;
                                        $nombreCompleto = $primerNombre . " " . $segundoNombre . " " . $primerApellido . " " . $segundoApellido;
                                        $titulo = $cliente->entidad ? $cliente->entidad : $nombreCompleto;
                                        $clienteId = $cliente->id;
                                    @endphp
                                    <option value="{{ $clienteId }}">{{ $clienteId . ' - ' . $titulo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label" for="descripcion">
                                <span class="label-text">Descripción</span>
                            </label>
                            <input type="text" name="descripcion" placeholder="Escriba una descripcion" maxlength="255" class="input input-bordered" />
                        </div>
                    </div>

                    <div id="form-trabajos" data-trabajo-index="1">
                        <div class="trabajo">
                            <h2 class="text-center font-semibold m-4 uppercase">Trabajo 1</h2>
                            <div class="form-control">
                                <label class="label" for="trabajos[0][logotipo]">
                                    <span class="label-text">Logotipo</span>
                                </label>
                                <input type="text" name="trabajos[0][logotipo]" placeholder="Escriba el logotipo" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][cantidad_colores]">
                                    <span class="label-text">Cantidas de colores</span>
                                </label>
                                <input type="number" name="trabajos[0][cantidad_colores]" placeholder="cantida de colores" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][colores]">
                                    <span class="label-text">Colores (separelos con una coma (,))</span>
                                </label>
                                <input type="text" name="trabajos[0][colores]" placeholder="Escriba los colores " maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][tipo_pintura]">
                                    <span class="label-text">Tipo de pintura</span>
                                </label>
                                <input type="text" name="trabajos[0][tipo_pintura]" placeholder="Escriba el tipo de pintura" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][ubicacion_estampados]">
                                    <span class="label-text">Ubicación de estampados</span>
                                </label>
                                <input type="text" name="trabajos[0][ubicacion_estampados]" placeholder="Escriba la ubicación" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][tamanio]">
                                    <span class="label-text">Tamaño</span>
                                </label>
                                <input type="text" name="trabajos[0][tamanio]" placeholder="Escribe el tamaño ej (grande)" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][cantidad_estampados]">
                                    <span class="label-text">Cantidad de estampados</span>
                                </label>
                                <input type="number" name="trabajos[0][cantidad_estampados]" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][cantidad_prendas]">
                                    <span class="label-text">Cantidad de prendas</span>
                                </label>
                                <input type="number" name="trabajos[0][cantidad_prendas]" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="trabajos[0][tipo_prendas]">
                                    <span class="label-text">Tipo de prendas</span>
                                </label>
                                <input type="text" name="trabajos[0][tipo_prendas]" placeholder="Escriba el tipo de prendas" maxlength="255" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                    <div class="form-control mt-6">
                        <button type="button" class="btn btn-primary" id="add-trabajo">Añadir trabajo</button>
                        <button type="submit" class="btn btn-primary mt-4">Crear Orden de trabajo</button>
                        <a href="{{ route('ordenestrabajos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

<script src="{{ asset('js/trabajos.js') }}"></script>