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
                <h3>Cadastro do Tipo de Sintoma</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-tipo.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'sintoma-tipo.store','method' => 'post')) }}

            <div class="form-group">
                {{ Form::label('nomeSintomas', 'Tipo de Sintoma') }}
                {{ Form::text('nomeSintomas',null,array('class'=>'form-control', 'placeholder'=>'Tipo de Sintoma')) }}
            </div>

            <div class="form-group">
                {{ Form::Label('nomeCategoria', 'Categoria do Sintoma:') }}
                <select name="nomeCategoria" class="form-control">
                    <option value="" selected>Selecione a categoria...</option>
                    @foreach($categoria as $c)
                    <option value="{{$c->id}}">{{$c->nome_categoria}}</option>
                    @endforeach
                </select>

            </div>
{{--
            <div class="form-group">
                {{ Form::Label('', 'Categoria do Sintoma:') }}
                <select name="nomeCategoria2" class="form-control">
                    @foreach($categoria as $c)
                    <option value="{{ $c->id }}" @if(old('categoria')&&old('categoria')== $c->id) selected='selected' @endif >{{ $c->nome_categoria }}</option>
                    @endforeach
                </select>
            </div>
--}}
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
        </div>
    </div>



</div>
@endsection