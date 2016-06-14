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
                <h3>Edição do Profissional</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::model($profissional,['method' => 'PATCH','route'=>['profissional.update',$profissional->id]]) }}
            
            <div class="form-group">
            {{ Form::label('nomeProfissional', 'Nome do Profissional:') }}
            {{ Form::text('nomeProfissional',null,array('class'=>'form-control', 'placeholder'=>'Ex: John Sena..','autofocus'))  }}
            </div>
            
            <div class="form-group">
                {{ Form::Label('sexoProfissional', 'Sexo:') }}
                <select name="sexoProfissional" class="form-control">
                    <option value="" >Selecione o sexo...</option>
                    <option value="m" @if($profissional->sexoProfissional == "m") selected='selected' @endif >Masculino</option>
                    <option value="f" @if($profissional->sexoProfissional == "f") selected='selected' @endif >Feminino</option>
                </select>
            </div>
                   
            <div class="form-group">
            {{ Form::label('telefoneProfissional', 'Telefone:') }}
            {{ Form::text('telefoneProfissional',null,array('class'=>'form-control', 'placeholder'=>'Ex: 0000-0001'))  }}
            </div>
            
            <div class="form-group">
                {{ Form::Label('idCargo', 'Cargo:') }}
                <select name="idCargo" class="form-control">
                    <option value="" selected>Selecione a categoria...</option>
                    @foreach($cargo as $c)
                    <option value="{{$c->id}}" @if($c->id == $profissional->idCargo) selected='selected' @endif >{{$c->nome_cargo}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="col-md-2">
                {{ Form::submit('Atualizar',array('class' => 'btn btn-success')) }}

                {{ Form::hidden('id', $profissional->id) }}

                {{ Form::close() }}
            </div>

            <div class="col-md-2">
                {{ Form::open(['method' => 'DELETE','route'=>['profissional.destroy',$profissional->id]]) }}

                {{ Form::submit('Excluir',array('class' => 'btn btn-danger')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection