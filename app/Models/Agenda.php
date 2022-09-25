<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected  $fillable = [
        'fecha',
        'hora',
        'sintomas',
        'departamento',
        'paciente_id'
    ];

    //relacion para obtener los pacientes que se le agenda la cita
    public function Paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}
