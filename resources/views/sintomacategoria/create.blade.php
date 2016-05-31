@extends('layout.app')

@section('content')
<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Cadastro de Categoria do Sintoma</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-categoria.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Na categoria do sintoma, serão definidos os nomes que representarão os tipos dos sintomas.
                    <br>Exemplo: Tratamento ou Hábito.
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::open(array('route' => 'sintoma-categoria.store','method' => 'post')) }}
            
            <div class="form-group">
            {{ Form::label('nomeCategoria', 'Categoria:') }}
            {{ Form::text('nomeCategoria',null,array('class'=>'form-control', 'placeholder'=>'Categoria do sintoma..','autofocus'))  }}
            </div>
            
            <div class="col-md-2">
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection