<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    protected $fillable = [
        'idMedico', 'idPaciente', 'dataMarcada', 'concluida', 'horaMarcada'
    ];

    public function medico() {
        return $this->belongsTo('App\Models\User', 'idMedico');
    }

    public function paciente() {
        return $this->belongsTo('App\Models\Paciente', 'idPaciente');
    }
}
