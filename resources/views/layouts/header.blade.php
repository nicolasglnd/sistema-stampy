<header class="flex justify-between items-center bg-blue-500 p-4 text-white">
    <div class="flex-1"></div>
    <nav class="relative">
        <ul class="flex space-x-4">
            <li><a href="" class="hover:underline">Inicio</a></li>
            <li><a href="" class="hover:underline">Quienes somos</a></li>
            <li class="relative">
                <button id="menu-1-boton" class="hover:underline">Sistema de información</button>
                <div id="menu-1" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-48 z-10">
                    <a href="{{ route('empleados.index') }}" class="block px-4 py-2 hover:bg-gray-200">Empleado</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Cliente</a>
                    <a href="{{ route('inventario.index') }}" class="block px-4 py-2 hover:bg-gray-200">Inventario</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Pantalla serigrafica</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Orden de trabajo</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Factura Electronica</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Costos finales</a>
                </div>
            </li>
            <li class="relative">
                <button id="menu-2-boton" class="hover:underline">información</button>
                <div id="menu-2" class="absolute hidden bg-white text-black mt-2 rounded shadow-lg w-48 z-10">
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Documentación</a>
                    <a href="" class="block px-4 py-2 hover:bg-gray-200">Tutoriales del sistema</a>
                </div>
            </li>
            <li><a href="" class="hover:underline">dashboard</a></li>
        </ul>
    </nav>
    <div class="flex-1"></div>

    <div id="config-container" class="relative">
        <img src="{{ asset('images/gear.svg') }}" alt="Configuración" id="config-boton" class="h-8 w-8 rounded-full cursor-pointer" />
        <div id="config-menu" class="absolute hidden left-0 transform -translate-x-3/4 bg-white text-black mt-2 rounded shadow-lg w-40 z-10">
            <a href="" class="block px-4 py-2 hover:bg-gray-200">Iniciar sesión</a>
            <a href="" class="block px-4 py-2 hover:bg-gray-200">Configuración</a>
            <a href="" class="block px-4 py-2 hover:bg-gray-200">Cerrar sesión</a>
        </div>
    </div>
</header>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const toggleDropdown = (botonId, menuId) => {
            const boton = document.getElementById(botonId);
            const menu = document.getElementById(menuId);
            boton.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });

            window.addEventListener('click', (event) => {
                if (!boton.contains(event.target) && !menu.contains(event.target)) {
                    menu.classList.add('hidden');
                }
            });
        };
        toggleDropdown('menu-1-boton', 'menu-1');
        toggleDropdown('menu-2-boton', 'menu-2');
        toggleDropdown('config-boton', 'config-menu');
    });
</script>