@extends('layouts.layout')

@section('pg_title', 'Agendamento')

@section('body')


    <form @if($edit ?? '') action="{{ route('editarAgendamento', ['id' => $consulta->id])}}" @else action="{{ route('agendarAction')}}" @endif method="post">
        @csrf
        <div class="form-group">
            <label for="pacientes">Selecione um paciente:</label>
            <select class="form-control" name="paciente" id="pacientes">
                @foreach($pacientes as $paciente)
                    <option @if($edit ?? '') @if($consulta->pac_id == $paciente->id) selected @endif @endif value="{{$paciente->id}}">{{$paciente->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label class="label title" for="validate">Data da consulta: </label>
            <input class="form-control" type="date" name="dataMarcada" @if($edit ?? '') value="{{$consulta->dataMarcada}}" @endif required>
        </div>
        <div class="form-group">
            <label class="label title" for="validate">Horário da consulta: </label>
            <input class="form-control" type="time" name="horaMarcada" @if($edit ?? '') value="{{$consulta->horaMarcada}}" @endif required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" @if($edit ?? '') value="Editar" @else value="Agendar" @endif>
        </div>

        @if (session('sucesso'))
            <div class="alert alert-success" role="alert">
                {{session('sucesso')}}
            </div>
        @endif

        @if (session('erro'))
            <div class="alert alert-danger" role="alert">
                {{session('erro')}}
            </div>
        @endif
    </form>
@endsection