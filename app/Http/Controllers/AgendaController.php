<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    /* public function pacienteHistorial(Paciente $paciente)
    {
        $historiales = Historial::where('paciente_id', $paciente->id)->get();
        return response()->json($historiales);
    } */


    public function index()
    {
        $agendas = Agenda::with('paciente')->get();
        return response()->json($agendas);
    }

    public function pacientes()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agendas = Agenda::create($request->post());
        
        return response()->json([
            'mensaje' => 'Agenda agregado correctamente',
            'agenda' => $agendas
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        return response()->json($agenda);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $agenda->fill($request->post())->save();

        return response()->json([
            'mensaje' => 'Agenda actulizado correctamente',
            'paciente' => $agenda
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        
        return response()->json([
            'mensaje' => 'Agenda eliminado correctamente'
        ]);
    }
}
