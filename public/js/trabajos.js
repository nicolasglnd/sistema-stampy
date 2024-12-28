document.addEventListener('DOMContentLoaded', function() {
    const trabajoCampos = [
        { for: 'logotipo', span:'Logotipo', placeholder: 'Escribe el logotipo', type: 'text' },
        { for: 'cantidad_colores', span:'Cantidad de colores', placeholder: 'Escribe la cantidad', type: 'number' },
        { for: 'colores', span: 'Colores', placeholder: 'Escibe los colores', type: 'text' },
        { for: 'tipo_pintura', span: 'Tipo de pintura', placeholder: 'Tipos de pintura', type: 'text' },
        { for: 'ubicacion_estampados', span: 'Ubicación de estampados', placeholder: 'Escribe la ubicación (espalda)', type: 'text' },
        { for: 'tamanio', span: 'Tamaño', placeholder: 'Escribe el tamaño ej (grande)', type: 'text' },
        { for: 'cantidad_estampados', span: 'Cantidad de estampados', placeholder: 'Cantidad de estampados', type: 'number' },
        { for: 'cantidad_prendas', span: 'Cantidad de prendas', placeholder: 'Cantidad de prendas', type: 'number' },
        { for: 'tipo_prendas', span: 'Tipo de prendas', placeholder: 'Escriba el tipo de preendas', type: 'text' }
    ];

    const trabajosDiv = document.querySelector("#form-trabajos");
    let iArrayTrabajo = parseInt(trabajosDiv.getAttribute('data-trabajo-index'));
    let trabajoIndex = iArrayTrabajo + 1;

    document.querySelector('#add-trabajo').addEventListener('click', (e) => {
        e.preventDefault();
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
            label.htmlFor = `trabajos[${iArrayTrabajo}][${campo.for}]`;

            let span = document.createElement('span');
            span.classList.add('label-text');
            span.textContent = campo.span;


            let input = document.createElement('input');
            input.type = campo.type;
            input.name = `trabajos[${iArrayTrabajo}][${campo.for}]`;
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
        iArrayTrabajo++;

    });
});