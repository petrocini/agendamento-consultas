@extends ('layouts.layout')

@section('pg_title', 'Home')

@section('body')

@if(Auth::user()->hasRole('admin'))
    <h2> Seja bem - vindo ao sistema de gerenciamento para consultas médicas, por favor, crie um médico para iniciar a criação ! </h2>
@else
    <table class="table">

        @if(Auth::user()->hasRole('medico'))
        <a href="{{ route ('agendar')}}"><h3>Nova Consulta</h3></a>
        @endif
        
        <thead class="thead-dark">
            <th>Paciente: </th>
            <th>Data: </th>
            <th>Hora: </th>
            <th class="text-center" colspan="3">Ações</th>
        </thead>
        <tbody>
            @foreach($consultas as $consulta)
                    <tr>
                        <td class="align-middle">{{$consulta->paciente->name}}</td>
                        <td class="align-middle">{{$consulta->dataMarcada}}</td>
                        <td class="align-middle">{{$consulta->horaMarcada}}</td>
                        <td class="text-center">
                            <a href="{{route('agendar',['id'=>$consulta->id])}}" title="Editar consulta"  type="button" class="btn btn-success"><i class="fas fa-user-edit"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('consultaEfetuada', ['id'=>$consulta->id])}}" title="Marcar consulta como efetuada" type="button" class="btn btn-info"><i class="far fa-check-circle"></i></a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('apagarAgendamento', ['id'=>$consulta->id])}}" title="Deletar consulta" type="button" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('sucesso'))
        <div class="alert alert-success" role="alert">
            {{session('sucesso')}}
        </div>
    @endif
@endif
@endsection