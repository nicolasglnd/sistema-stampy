<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Models\OrdenTrabajo;
use App\Models\Trabajo;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrdenTrabajoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ordenes = OrdenTrabajo::with('trabajos')->get();
        return view('ordenes_trabajos.index', compact('ordenes'));
    }

    //nuevo metodo
    public function trabajos($id)
    {
        $trabajos = OrdenTrabajo::findOrFail($id)->trabajos;
        return response()->json($trabajos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('ordenes_trabajos.create', compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validar la solicitud
        $request->validate([
            'total_cantidad_prendas' => 'required|integer',
            'total_cantidad_estampados' => 'required|integer'
        ]);

        //orden
        $orden = OrdenTrabajo::create($request->only([
            'total_cantidad_estampados',
            'total_cantidad_prendas',
            'id_cliente',
            'descripcion'
        ]));

        //trabajos
        if ($request->has('trabajos')) {
            foreach ($request->trabajos as $trabajoDatos) {
                $trabajo = new Trabajo($trabajoDatos);
                $trabajo->id_orden_trabajo = $orden->id;
                $trabajo->save();
            }
        }

        return redirect()->route('ordenestrabajos.index')->with('success', 'La orden de trabajo con todos sus trabajos correpondientas han sido guardados correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(OrdenTrabajo $orden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrdenTrabajo $ordenestrabajo)
    {
        $clientes = Cliente::all();
        $trabajos = $ordenestrabajo->trabajos;
        return view('ordenes_trabajos.edit', [
            'orden' => $ordenestrabajo,
            'clientes' => $clientes,
            'trabajos' => $trabajos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrdenTrabajo $ordenestrabajo)
    {
        //validar


        //orden
        $ordenestrabajo->update($request->only([
            'total_cantidad_estampados',
            'total_cantidad_prendas',
            'id_cliente',
            'descripcion'           
        ]));

        //trabajos
        foreach($request->trabajos as $trabajoDatos) {
            $trabajoDatos['id_orden_trabajo'] = $ordenestrabajo->id;
            $trabajoId = $trabajoDatos['id'] ?? null;

            if ($trabajoId) {
                $trabajo = Trabajo::find($trabajoId);

                if ($trabajo) {
                    $trabajo->update($trabajoDatos);
                }
            }
            else {
                $trabajo = new Trabajo($trabajoDatos);
                $trabajo->save();
            }
        }
        
        return redirect()->route('ordenestrabajos.index')->with('success', 'La orden de trabajo con todos sus trabajos correpondientas han sido actualizados correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrdenTrabajo $ordenestrabajo)
    {
        //
        $ordenestrabajo->delete();

        return redirect()->route('ordenestrabajos.index')->with('success', 'La orden de trabajo con todos sus trabajos correpondientas han sido eliminados correctamente');
    }
}
