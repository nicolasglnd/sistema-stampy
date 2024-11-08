<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Sistema Stampy')</title>
</head>
<body>
    <header>
        @include('layouts.header')
    </header>

    <main>
        @yield('contenido', )
    </main>

    {{-- footer --}}
    @include('layouts.footer')
    
</body>
</html>