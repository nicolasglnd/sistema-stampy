@extends('layouts.app')

@section('titulo', 'Crear Insumo')
@section('cabecera', 'Crear Insumo')

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
                            <label class="label" for="descripcion">
                                <span class="label-text">Descripción</span>
                            </label>
                            <input type="text" name="descripcion" placeholder="Escriba una descripcion" maxlength="255" class="input input-bordered" />
                        </div>
                    </div>

                    <div id="form-trabajos">
                        <div class="trabajo">
                            <h2 class="text-center font-semibold m-4 uppercase">Trabajo 1</h2>
                            <div class="form-control">
                                <label class="label" for="logotipo">
                                    <span class="label-text">Logotipo</span>
                                </label>
                                <input type="text" name="logotipo" placeholder="Escriba el logotipo" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="cantidad_colores">
                                    <span class="label-text">Cantidas de colores</span>
                                </label>
                                <input type="number" name="cantidad_colores" placeholder="cantida de colores" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="colores">
                                    <span class="label-text">Colores (separelos con una coma (,))</span>
                                </label>
                                <input type="text" name="colores" placeholder="Escriba los colores " maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="tipo_pintura">
                                    <span class="label-text">Tipo de pintura</span>
                                </label>
                                <input type="text" name="tipo_pintura" placeholder="Escriba el tipo de pintura" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="ubicacion_estampados">
                                    <span class="label-text">Ubicación de estampados</span>
                                </label>
                                <input type="text" name="ubicacion_estampados" placeholder="Escriba la ubicación" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="tamanio">
                                    <span class="label-text">Tamaño</span>
                                </label>
                                <input type="text" name="tamanio" placeholder="Escribe el tamaño ej (grande)" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="cantidad_estampados">
                                    <span class="label-text">Cantidad de estampados</span>
                                </label>
                                <input type="number" name="cantidad_estampados" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="cantidad_prendas">
                                    <span class="label-text">Cantidad de prendas</span>
                                </label>
                                <input type="number" name="cantidad_prendas" placeholder="Escriba la cantidad" maxlength="255" class="input input-bordered" />
                            </div>

                            <div class="form-control">
                                <label class="label" for="tipo_prendas">
                                    <span class="label-text">Tipo de prendas</span>
                                </label>
                                <input type="text" name="tipo_prendas" placeholder="Escriba el tipo de prendas" maxlength="255" class="input input-bordered" />
                            </div>
                        </div>
                    </div>
                    <div class="form-control mt-6">
                        <button class="btn btn-primary" id="add-trabajo">Añadir trabajo</button>
                        <button class="btn btn-primary mt-4">Crear Orden de trabajo</button>
                        <a href="{{ route('ordenestrabajos.index') }}" class="btn btn-outline btn-primary mt-4">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const trabajoCampos = [
            { for:'logotipo', span:'Logotipo', placeholder: 'Escribe el logotipo', type: 'text' },
            { for: 'cantidad_colores', span:'Cantidad de colores', placeholder: 'Escribe la cantidad', type: 'number' },
            { for: 'colores', span: 'Colores', placeholder: 'Escibe los colores', type: 'text' },
            { for: 'tipo_pintura', span: 'Tipo de pintura', placeholder: 'Tipos de pintura', type: 'text' },
            { for: 'ubicacion_estampados', span: 'Ubicación de estampados', placeholder: 'Escribe la ubicación (espalda)', type: 'text' },
            { for: 'tamanio', span: 'Tamaño', placeholder: 'Escribe el tamaño ej (grande)', type: 'text' },
            { for: 'cantidad_estampados', span: 'Cantidad de estampados', placeholder: 'Cantidad de estampados', type: 'number' },
            { for: 'cantidad_prendas', span: 'Cantidad de prendas', placeholder: 'Cantidad de prendas', type: 'number' },
            { for: 'tipo_prendas', span: 'Tipo de prendas', placeholder: 'Escriba el tipo de preendas', type: 'text' }
        ];

        let trabajoIndex = 2;
        document.querySelector('#add-trabajo').addEventListener('click', (e) => {
            e.preventDefault();
            const trabajosDiv = document.querySelector("#form-trabajos");
            const nuevoTrabajoDiv = document.createElement('div');
            nuevoTrabajoDiv.classList.add('trabajo');

            const h2 = document.createElement('h2');
            h2.classList.add('text-center');
            h2.classList.add('font-semibold');
            h2.classList.add('m-4');
            h2.classList.add('uppercase');
            h2.textContent = 'trabajo ' + trabajoIndex;

            nuevoTrabajoDiv.append(h2);

            trabajoCampos.forEach(campo => {
                let formDiv = document.createElement('div');
                formDiv.classList.add('form-control');
                
                let label = document.createElement('label');
                label.classList.add('label');
                label.htmlFor = campo.for;

                let span = document.createElement('span');
                span.classList.add('label-text');
                span.textContent = campo.span;


                let input = document.createElement('input');
                input.type = campo.type;
                input.name = campo.for;
                input.placeholder = campo.placeholder;
                input.maxLength = 255;
                input.classList.add('input');
                input.classList.add('input-bordered');

                //append
                label.appendChild(span);
                formDiv.appendChild(label);
                formDiv.appendChild(input);

                nuevoTrabajoDiv.appendChild(formDiv);
            });

            trabajosDiv.appendChild(nuevoTrabajoDiv);
            trabajoIndex++;

        });
    });
</script>