<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Illuminate\Http\Request;

class CitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('citas.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Citas::$rules);
        $evento = Citas::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function show(Citas $citas)
    {
        $citas = Citas::all();
        $formatted_events = $citas->map(function ($cita) {
            return [
                'id' => $cita->id,
                'documento' => $cita->documento,
                'nombre' => $cita->nombre,
                'apellido' => $cita->apellido,
                'mascota' => $cita->mascota,
                'title' => $cita->nombre.'-'.$cita->mascota,
                'start' => $cita->start.' '.$cita->hora,
                'end' => $cita->end,
                'hora' => $cita->hora
            ];
        });
        return response()->json($formatted_events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $citas = Citas::find($id);
        return response()->json($citas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Citas $citas)
    {
        request()->validate(Citas::$rules);
        $citas->update($request->all());
        return response()->json($citas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Citas  $citas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $evento = Citas::find($id)->delete();
        return response()->json($evento);
    }
}
