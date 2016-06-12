@extends('layout.app')

@section('content')

{{--Identificando os erros na tela--}}
@if (count($errors)> 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Marcação de consulta</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('paciente-cadastro.index', 'Cancelar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::model($pacienteCadastro,['method' => 'PUTH','route'=>['consulta.store',$pacienteCadastro->idPaciente]]) }}
           
            <div class="form-group">
                {{ Form::label('nomePaciente', 'Nome') }}
                {{ Form::text('nomePaciente', null, array('class'=>'form-control', 'placeholder'=>'Nome do paciente','disabled')) }}
            </div>

            <div class="form-group">
                {{ Form::label('cpfPaciente', 'CPF') }}
                {{ Form::text('cpfPaciente', null, array('class'=>'form-control', 'placeholder'=>'CPF do Paciente','disabled')) }}
            </div>
            {{ Form::close() }}
            
            
            {{ Form::open(array('route' => 'consulta.store','method' => 'post')) }}

            <div class="form-group">
                {{ Form::hidden('nomePaciente', $pacienteCadastro->idPaciente, array('class'=>'form-control')) }}
            </div>
            
            <div class="form-group">
             {{ Form::Label('nomeProfissional', 'Profissional:') }}
                <select name="nomeProfissional" class="form-control">
                    <option value="" selected>Selecione o profissional...</option>
                    <option value="1">Antonio bicho solto</option>
                </select>
            </div>
            
            <div class="form-group">
                {{ Form::label('dataConsulta', 'Data da Consulta') }}
                {{ Form::text('dataConsulta', null, array('class'=>'form-control')) }}
            </div>
            
            {{ Form::submit('Marcar',array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
            
        </div>
    </div>
    
</div>
@endsection