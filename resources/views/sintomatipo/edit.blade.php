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
                <h3>Edição do Tipo de Sintoma</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-tipo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::model($sintomaTipo,['method' => 'PATCH','route'=>['sintoma-tipo.update',$sintomaTipo->id]]) }}

            <div class="form-group">
                {{ Form::label('nomeSintomas', 'Tipo de Sintoma') }}
                {{ Form::text('nomeSintomas', null, array('class'=>'form-control', 'autofocus')) }}
            </div>

            <div class="form-group">
                {{-- Form::label('nomeCategoria', 'Tipo de categoria') --}}
                {{-- Form::text('nomeCategoria', null, array('class'=>'form-control')) --}}
            </div>

            <div class="form-group">
                {{ Form::Label('', 'Categoria do Sintoma:') }}
                <select name="nomeCategoria" class="form-control">
                    <option value="" selected>Selecione a categoria...</option>
                    @foreach($categoria as $c)
                    <option value="{{$c->id}}" @if($c->id == $sintomaTipo->idCategoria) selected='selected' @endif >{{$c->nome_categoria}}</option>
                    @endforeach
                </select>
            </div>
                       
            <div class="col-md-2">
                {{ Form::submit('Atualizar',array('class' => 'btn btn-success', )) }}

                {{ Form::hidden('id', $sintomaTipo->id) }}

                {{ Form::close() }}
            </div>

            <div class="col-md-2">
                {{ Form::open(['method' => 'DELETE','route'=>['sintoma-tipo.destroy',$sintomaTipo->id]]) }}

                {{ Form::submit('Excluir',array('class' => 'btn btn-danger')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection