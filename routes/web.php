<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Rotas para login/home
Route::get('/', 'AuthController@index')->name('login');
Route::get('/logout', 'AuthController@logout')->name('logout');
Route::post('/login', 'AuthController@login')->name('loginAction');
Route::get('/home', 'AuthController@home')->name('home');
//Rotas para Agendamento
Route::get('/home/agendamentos/{id?}', 'AgendamentoController@index')->name('agendar');
Route::post('/home/agendamentos/action', 'AgendamentoController@criar')->name('agendarAction');
Route::get('/home/consulta_efetuada', 'AgendamentoController@efetuar')->name('consultaEfetuada');
Route::post('/home/agendamentos/editar/{id?}', 'AgendamentoController@editar')->name('editarAgendamento');
Route::get('/home/agendamentos/apagar_agendamento/{id?}', 'AgendamentoController@apagar')->name('apagarAgendamento');
//Rotas para Pacientes
Route::get('/home/lista_pacientes', 'PacienteController@index')->name('listaPaciente');
Route::post('/home/lista_pacientes/editar_pacientes/action/{id}', 'PacienteController@editar')->name('editarPacienteAction');
Route::get('/home/lista_pacientes/registrar_pacientes/{id?}', 'PacienteController@criar')->name('registrarPaciente');
Route::post('/home/lista_pacientes/registrar_paciente/action/{id?}', 'PacienteController@criarAction')->name('registrarPacienteAction');
route::get('/home/lista_pacientes/deletar_paciente/{id}', 'PacienteController@deletar')->name('deletarPaciente');
//Rotas para Médicos
Route::get('/home/lista_medico', 'MedicoController@index')->name('listaMedico');
Route::post('/home/lista_medico/editar_medico/action/{id}', 'MedicoController@editar')->name('editarMedicoAction');
Route::get('/home/lista_medico/registrar_medico/{id?}', 'MedicoController@criar')->name('registrarMedico');
Route::post('/home/lista_medico/registrar_medico/action/{id?}', 'MedicoController@criarAction')->name('registrarMedicoAction');
route::get('/home/lista_medico/apagar_medico/{id}', 'MedicoController@apagar')->name('apagarMedico');