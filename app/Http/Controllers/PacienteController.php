<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::all();
        return response()->json($pacientes);
    }

    public function pacienteHistorial(Paciente $paciente)
    {
        $historiales = Historial::where('paciente_id', $paciente->id)->get();
        return response()->json($historiales);
    }

    public function store(Request $request)
    {   
         $pacientes = Paciente::create($request->post());
        
        return response()->json([
            'mensaje' => 'Paciente agregado correctamente',
            'Paciente' => $pacientes
        ]);
    }


    public function show(Paciente $paciente)
    {
        return response()->json($paciente);
    }

        public function update(Request $request, Paciente $paciente)
    {
        $paciente->fill($request->post())->save();

        return response()->json([
            'mensaje' => 'Paciente actulizado correctamente',
            'paciente' => $paciente
        ]);
    }

    
    public function destroy(Paciente $paciente)
    {

       $paciente->delete();
        
        return response()->json([
            'mensaje' => 'Paciente eliminado correctamente'
        ]);

    }
}
