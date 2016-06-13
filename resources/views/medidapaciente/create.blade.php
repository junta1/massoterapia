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
                <h3>Cadastro das Medidas</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('medida-paciente.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Nesta área, serão definidos os nomes que representarão as medidas do paciente.
                    <br>Exemplo: Medidas do ombro, quadril e coxa.
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::open(array('route' => 'medida-paciente.store','method' => 'post')) }}
            
            <div class="form-group">
            {{ Form::label('areaMedida', 'Medida:') }}
            {{ Form::text('areaMedida',null,array('class'=>'form-control', 'placeholder'=>'Ex: Quadril..','autofocus'))  }}
            </div>
            
            <div class="col-md-2">
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection