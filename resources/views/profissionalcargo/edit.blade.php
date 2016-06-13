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
                <h3>Edição do Cargo</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional-cargo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::model($cargo,['method' => 'PATCH','route'=>['profissional-cargo.update',$cargo->id]]) }}

            <div class="form-group">
                {{ Form::label('nomeCargo', 'Cargo:') }}
                {{ Form::text('nomeCargo', null, array('class'=>'form-control', 'autofocus')) }}
            </div>
                       
            <div class="col-md-2">
                {{ Form::submit('Atualizar',array('class' => 'btn btn-success', )) }}

                {{ Form::hidden('id', $cargo->id) }}

                {{ Form::close() }}
            </div>

            <div class="col-md-2">
                {{ Form::open(['method' => 'DELETE','route'=>['profissional-cargo.destroy',$cargo->id]]) }}

                {{ Form::submit('Excluir',array('class' => 'btn btn-danger')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection