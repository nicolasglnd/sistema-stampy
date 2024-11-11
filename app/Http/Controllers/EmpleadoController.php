<?php

namespace App\Http\Controllers;
//cambie en update, edit y destroy parametro de empleados a empleado
use App\Models\Empleado;
use App\Models\Persona;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::with('persona')->get();
        return view('empleados.index', compact('empleados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $persona = Persona::create($request->only([
            'primer_nombre',
            'segundo_nombre',
            'primer_apellido',
            'segundo_apellido',
            'direccion',
            'telefono_1',
            'telefono_2',
            'id_tipo_doc',
            'documento_id'
        ]));
        Empleado::create([
            'id' => $persona->id,
            'id_rol' => $request-> id_rol,
            'email' => $request-> email,
            'logro_academico' =>$request-> logro_academico,
            'activo' => $request->activo,
            'salario' => $request-> salario,
            'eps' => $request->eps,
            'arl' => $request-> arl,
            'caja_compensacion' => $request-> caja_compensacion,
            'fondo_pension' => $request-> fondo_pension,
            'fecha_nacimiento' => $request-> fecha_nacimiento,
            'fecha_ingreso' => $request-> fecha_ingreso
        ]);

        return to_route('empleados.index')->with('info', 'Empleado creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleados $empleado)
    {
        return view('empleados.edit', ['empleado' => $empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleados $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleados $empleado)
    {
        $persona = $empleado->persona;
        $empleado->delete();
        if ($persona) {
            $persona->delete();
        }
        return to_route('empleados.index')->with('info', 'Empleado eliminado con exito');
    }
}
