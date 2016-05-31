@extends('layout.app')

@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Editar a Categoria do Sintoma</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-categoria.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-6'>

            {{ Form::model($sintomaCategoria,['method' => 'PATCH','route'=>['sintoma-categoria.update',$sintomaCategoria->id]]) }}

            <div class="form-group">
                {{ Form::label('nomeCategoria', 'Nome da Categoria') }}
                {{ Form::text('nomeCategoria', null, array('class'=>'form-control', 'placeholder'=>'Digite o nome da categoria..','autofocus')) }}
            </div>

            <div class="col-md-2">
                {{ Form::submit('Atualizar',array('class' => 'btn btn-success')) }}

                {{ Form::hidden('id', $sintomaCategoria->id) }}

                {{ Form::close() }}
            </div>
            <div class="col-md-2">
                {{ Form::open(['method' => 'DELETE','route'=>['sintoma-categoria.destroy',$sintomaCategoria->id]]) }}

                {{ Form::submit('Excluir',array('class' => 'btn btn-danger')) }}

                {{ Form::close() }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection