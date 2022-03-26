<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Paciente;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Carbon;

class AgendamentoController extends Controller
{

    public function index(Request $request) {
        if ($request->id == null) {
            $pacientes = Paciente::all();
            return view('agendamento', ['pacientes' => $pacientes]);
        } else {
            $pacientes = Paciente::all();
            $consulta = Agendamento::find($request->id);
            $edit = true;
            return view('agendamento', compact('edit'), ['pacientes' => $pacientes, 'consulta' => $consulta]);
        }
    }

    public function criar(Request $request) {
        $medico = Auth::user()->id;
        $paciente = $request->paciente;
        $data = $request->dataMarcada;
        $time = $request->horaMarcada;

        $dia = Carbon\Carbon::now();
        $diaAtualString = $dia->toDateString();

        if ($diaAtualString > $data) {
            return redirect()->back()->with('erro', 'Não é possível marcar uma consulta para um dia anterior ao atual');
        }

        if ($consulta = Agendamento::first() != null) {
            $consulta = Agendamento::first()->where('idMedico', $medico)->where('dataMarcada', $data)->where('horaMarcada', $time)->where('concluida', 0)->get();
            if(count($consulta) > 0){
                return redirect()->back()->with('erro', 'Já existe uma consulta marcada neste horário');
            }
        }
        $agendamento = Agendamento::create([
            'idMedico' => $medico,
            'idPaciente' => $paciente,
            'dataMarcada' => $data,
            'horaMarcada' => $time
        ]);

        event(new Registered($agendamento));

        return redirect()->back()->with('sucesso', 'Agendamento realizado com sucesso');
    }

    public function editar(Request $request) {

        $dia = Carbon\Carbon::now();
        $diaAtualString = $dia->toDateString();

        if ($diaAtualString > $request->dataMarcada) {
            return redirect()->back()->with('erro', 'Não é possível fazer um agendamento para um dia anterior ao atual');
        }

        if ($consulta = Agendamento::first() != null) {
            $consulta = Agendamento::first()->where('idMedico', Auth::user()->id)->where('dataMarcada', $request->dataMarcada)->where('horaMarcada', $request->horaMarcada)->where('concluida', 0)->get();
            if (count($consulta) > 0) {
                return redirect()->back()->with('erro', 'Já existe um agendamento para este horário');
            }
        }

        Agendamento::find($request->id)->update([
            'idPaciente'=>$request->paciente,
            'dataMarcada'=>$request->dataMarcada,
            'horaMarcada' => $request->horaMarcada
        ]);

        return redirect()->route('home')->with('sucesso', 'Agendamento atualizado com sucesso');
    }

    public function efetuar(Request $request) {
        $agendamento = Agendamento::find($request->id);

        $agendamento->concluida = 1;

        $agendamento->save();

        return redirect()->back();
    }

    public function apagar(Request $request) {
            Agendamento::find($request->id)->delete();
            return redirect()->back();
    }
}
