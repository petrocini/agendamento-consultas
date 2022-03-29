<?php

namespace App\Http\Controllers\API;

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Agendamento; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ConsultasController extends Controller{
    public function getConsultas($id) {
        //Select geral para busca de consultas por médico
        if (Agendamento::where('idMedico', $id)->exists()) {
            $consultas = Agendamento::all()->where('idMedico', $id);
            return response()->json($consultas, 200);      
        } else {
            return response()->json([
                "message" => "Não existem consultas registradas para este médico"
            ], 404);
        }
    }
}