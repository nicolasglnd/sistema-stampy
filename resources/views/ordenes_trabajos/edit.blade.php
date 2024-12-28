@extends('layouts.app')

@section('titulo', 'Actualizar Orden de Trabajo')
@section('cabecera', 'Actualizar Orden de Trabajo')

@section('contenido') 

    <div class="flex justify-center">
        <div class="card w-96 shadow-2xl bg-base-100">
            <div class="card-body">
                <form action="{{ route('ordenestrabajos.update', $orden->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div id="form-orden">
                        <div class="form-control">
                            <label class="label" for="total_cantidad_estampados">
                                <span class="label-text">Cantidad total de estampados</span>
                            </label>
                            <input type="number" name="total_cantidad_estampados" placeholder="Total estampados" value="{{ $orden->total_cantidad_estampados }}" class="input input-bordered" required />
                        </div>
                        <div class="form-control">
                            <label class="label" for="total_cantidad_prendas">
                                <span class="label-text">Cantidad total de prendas</span>
                            </label>
                            <input type="number" name="total_cantidad_prendas" placeholder="Total de prendas" value="{{ $orden->total_cantidad_prendas }}" class="input input-bordered" required />
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
                                    <option value="{{ $clienteId }}" {{ $clienteId == $orden->id_cliente ? 'selected' : '' }}>{{ $clienteId . ' - ' . $titulo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-control">
                            <label class="label" for="descripcion">
                                <span class="label-text">Descripción</span>
                            </label>
                            <input type="text" name="descripcion" placeholder="Escriba una descripcion" value="{{ $orden->descripcion }}" maxlength="255" class="input input-bordered" />
                        </div>
                    </div>

                    <div id="form-trabajos" data-trabajo-index="{{ count($orden->trabajos) }}">
                        @foreach($orden->trabajos as $index => $trabajo)
                            <div class="trabajo">
                                <h2 class="text-center font-semibold m-4 uppercase">Trabajo {{ $index + 1 }}</h2>
                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][logotipo]">
                                        <span class="label-text">Logotipo</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][logotipo]" placeholder="Escriba el logotipo" maxlength="255" value="{{ $trabajo->logotipo }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][cantidad_colores]">
                                        <span class="label-text">Cantidas de colores</span>
                                    </label>
                                    <input type="number" name="trabajos[{{ $index }}][cantidad_colores]" placeholder="cantida de colores" maxlength="255" value="{{ $trabajo->cantidad_colores }}"class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][colores]">
                                        <span class="label-text">Colores (separelos con una coma (,))</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][colores]" placeholder="Escriba los colores " maxlength="255" value="{{ $trabajo->colores }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][tipo_pintura]">
                                        <span class="label-text">Tipo de pintura</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][tipo_pintura]" placeholder="Escriba el tipo de pintura" maxlength="255" value="{{ $trabajo->tipo_pintura }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][ubicacion_estampados]">
                                        <span class="label-text">Ubicación de estampados</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][ubicacion_estampados]" placeholder="Escriba la ubicación" maxlength="255" value="{{ $trabajo->ubicacion_estampados }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][tamanio]">
                                        <span class="label-text">Tamaño</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][tamanio]" placeholder="Escribe el tamaño ej (grande)" maxlength="255" value="{{ $trabajo->tamanio }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][cantidad_estampados]">
                                        <span class="label-text">Cantidad de estampados</span>
                                    </label>
                                    <input type="number" name="trabajos[{{ $index }}][cantidad_estampados]" placeholder="Escriba la cantidad" maxlength="255" value="{{ $trabajo->cantidad_estampados }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][cantidad_prendas]">
                                        <span class="label-text">Cantidad de prendas</span>
                                    </label>
                                    <input type="number" name="trabajos[{{ $index }}][cantidad_prendas]" placeholder="Escriba la cantidad" maxlength="255" value="{{ $trabajo->cantidad_prendas }}" class="input input-bordered" />
                                </div>

                                <div class="form-control">
                                    <label class="label" for="trabajos[{{ $index }}][tipo_prendas]">
                                        <span class="label-text">Tipo de prendas</span>
                                    </label>
                                    <input type="text" name="trabajos[{{ $index }}][tipo_prendas]" placeholder="Escriba el tipo de prendas" maxlength="255" value="{{ $trabajo->tipo_prendas }}" class="input input-bordered" />
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-control mt-6">
                        <button type="button" class="btn btn-primary" id="add-trabajo">Añadir trabajo</button>
                        <button type="submit" class="btn btn-primary mt-4">Actualizar Orden de trabajo</button>
                        <a href="{{ route('ordenestrabajos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script src="{{ asset('js/trabajos.js') }}"></script>