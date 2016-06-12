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
                <h3>Consulta</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('consulta.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Aqui serão realizados os cadastros das consultas.
                </div>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'consulta.store','method' => 'post')) }}

            <div class="form-group">
                {{ Form::label('nomePaciente', 'Nome') }}
                {{ Form::text('nomePaciente', null, array('class'=>'form-control')) }}
            </div>

            <div class="form-group">
                {{ Form::label('nomeProfissional', 'Profissional') }}
                {{ Form::text('nomeProfissional', null, array('class'=>'form-control')) }}
            </div>
            
            <div class="form-group">
                {{ Form::label('dataConsulta', 'Data de Nascimento') }}
                {{ Form::text('dataConsulta', null, array('class'=>'form-control')) }}
            </div>
            
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success')) }}

            {{ Form::close() }}
        </div>
    </div>
    
</div>
@endsection