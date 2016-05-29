@extends('layout.app')
@section('content')

<div class="container">
    <div class="page-header">
        <h3>
            Cadastro do Tipo de Sintoma
            {{ link_to_route('sintoma-tipo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}
        </h3>
    </div>

    <div class='row'>
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'sintoma-tipo.store','method' => 'post','class' => '')) }}

            <div class="form-group">
                {{ Form::label('tipoSintoma', 'Tipo de Sintoma') }}
                {{ Form::text('tipoSintoma','',array('class'=>'form-control', 'placeholder'=>'Tipo de Sintoma')) }}
            </div>

            <div class="form-group">
                {{ Form::Label('categoria', 'Categoria do Sintoma:') }}
                <select class="form-control" name="item_id">
                    <option value="0">Selecione a categoria...</option>
                    @foreach($categoria as $c)
                    <option value="{{$c->id}}">{{$c->nome_categoria}}</option>
                    @endforeach
                </select>
            </div>
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
        </div>
    </div>



</div>
@endsection