<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::with('persona')->get();
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        Cliente::create([
            'id' => $persona->id,
            'entidad' => $request-> entidad,
            'email_entidad' => $request->email_entidad,
            'email_responsable' => $request-> email_responsable,
            'telefono_responsable' => $request->telefono_responsable,
        ]);

        return redirect()->route('clientes.index')->with('info', 'Cliente creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $clientes)
    {
        //
    }
}
