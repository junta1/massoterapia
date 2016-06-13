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
                <h3>Cadastro do Cargo</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional-cargo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Registre o nome do cargo referente aos profissionais.
                    <br>Exemplo: Auxiliar de Estética.
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::open(array('route' => 'profissional-cargo.store','method' => 'post')) }}
            
            <div class="form-group">
            {{ Form::label('nomeCargo', 'Cargo:') }}
            {{ Form::text('nomeCargo',null,array('class'=>'form-control', 'placeholder'=>'Ex: Massoterapeuta..','autofocus'))  }}
            </div>
            
            <div class="col-md-2">
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection