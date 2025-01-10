<?php

namespace App\Http\Controllers;

use App\Models\CostoFinal;
use App\Models\OrdenTrabajo;
use Illuminate\Http\Request;

class CostosFinalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costos = CostoFinal::with('orden')->get();
        return view('costos_finales.index', compact('costos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CostosFinales $costosFinales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostosFinales $costosFinales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CostosFinales $costosFinales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostosFinales $costosFinales)
    {
        //
    }
}
