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
                <h3>Cadastro do Profissional</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional.index', 'Voltar', null, array('class' => 'btn btn-info')) }}</h3>
            </div>
        </div>
    </div>

    <div class="row">
        <div class='col-md-6'>
            <div class="panel panel-default">
                <div class="panel-body">
                    Cadastre informações sobre os profissionais que estarão responsáveis pelos atendimentos.
                    <br>Exemplo:
                    <br> Nome: John Sena
                    <br> Cargo: Massagista
                    <br> Sexo: Masculino
                    <br> Telefone: (71) 0000-0001
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-6'>

            {{ Form::open(array('route' => 'profissional.store','method' => 'post')) }}
            
            <div class="form-group">
            {{ Form::label('nomeProfissional', 'Nome do Profissional:') }}
            {{ Form::text('nomeProfissional',null,array('class'=>'form-control', 'placeholder'=>'Ex: John Sena..','autofocus'))  }}
            </div>
            
            <div class="form-group">
                {{ Form::Label('sexoProfissional', 'Sexo:') }}
                <select name="sexoProfissional" class="form-control">
                    <option value=" " selected>Selecione o sexo...</option>
                    <option value="m">Masculino</option>
                    <option value="f">Feminino</option>
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
                    <option value="{{$c->id}}">{{$c->nome_cargo}}</option>
                    @endforeach
                </select>

            </div>
            
            <div class="col-md-2">
            {{ Form::submit('Cadastrar',array('class' => 'btn btn-success', )) }}

            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@endsection