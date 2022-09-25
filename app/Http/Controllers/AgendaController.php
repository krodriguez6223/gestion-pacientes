<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Paciente;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    

    public function index()
    {
        $agendas = Agenda::with('paciente')->paginate(2);
        return response()->json($agendas);
    }

    public function pacientes()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    public function store(Request $request)
    {
        $agendas = Agenda::create($request->post());
        
        return response()->json([
            'mensaje' => 'Agenda agregado correctamente',
            'agenda' => $agendas
        ]);
    }


    public function show(Agenda $agenda, Paciente $paciente)
    {   
        $agenda = Agenda::where('id', $agenda->id)->with('paciente')->get();
        return response()->json($agenda);
    }

    public function update(Request $request, Agenda $agenda)
    {
        $agenda->fill($request->post())->save();

        return response()->json([
            'mensaje' => 'Agenda actulizado correctamente',
            'paciente' => $agenda
        ]);
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        
        return response()->json([
            'mensaje' => 'Agenda eliminado correctamente'
        ]);
    }
}
