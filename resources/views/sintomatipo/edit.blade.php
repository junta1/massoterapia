@extends('layout.app')

@section('content')

<div class="container">
    <div class="page-header">
        <h3>
            Edição do Tipo do Sintoma
            {{ link_to_route('sintoma-tipo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}
        </h3>
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
                    <option selected>Selecione a categoria...</option>
                    @foreach($categoria as $c)
                    <option value="{{$c->id}}" @if($c->id == $sintomaTipo->idCategoria) selected='selected' @endif >{{$c->nome_categoria}}</option>
                    @endforeach
                </select>
            </div>
            
            {{ Form::submit('Atualizar',array('class' => 'btn btn-success', )) }}

            {{ Form::hidden('id', $sintomaTipo->id) }}

            {{ Form::close() }}  

        </div>
    </div>
</div>
@endsection