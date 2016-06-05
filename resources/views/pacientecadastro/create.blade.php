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
                <h3>Cadastro de Categoria do Sintoma</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('paciente-cadastro.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Aqui serão realizados os cadastros dos pacientes.
                </div>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'paciente-cadastro.store','method' => 'post')) }}

            <div class="form-group">
                {{ Form::label('nomePaciente', 'Nome') }}
                {{ Form::text('nomePaciente', null, array('class'=>'form-control', 'placeholder'=>'Nome do paciente')) }}
            </div>

            <div class="form-group">
                {{ Form::label('cpfPaciente', 'CPF') }}
                {{ Form::text('cpfPaciente', null, array('class'=>'form-control', 'placeholder'=>'CPF do Paciente')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('emailPaciente', 'E-mail') }}
                {{ Form::text('emailPaciente', null, array('class'=>'form-control', 'placeholder'=>'E-mail do paciente')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('dataNascimentoPaciente', 'Data de Nascimento') }}
                {{ Form::text('dataNascimentoPaciente', null, array('class'=>'form-control', 'placeholder'=>'Data de nascimento')) }}
            </div>
            
            <div class="form-group">
                {{ Form::Label('sexoPaciente', 'Sexo:') }}
                <select name="sexoPaciente" class="form-control">
                    <option value="" selected>Selecione o sexo...</option>
                    <option value="m">Masculino</option>
                    <option value="f">Feminino</option>
                </select>
            </div>

            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
        </div>
    </div>
    
</div>
@endsection