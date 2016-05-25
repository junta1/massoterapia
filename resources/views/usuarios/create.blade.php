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
    
    <div class="page-header">
        <h3>
            Cadastro de Usuário
            {{ link_to_route('usuarios.index', 'Voltar', null, array('class' => 'btn btn-info')) }}
        </h3>
        
    </div>
    <div class='row'>
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'usuarios.store','method' => 'post','class' => '')) }}

            <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome','',array('class'=>'form-control', 'placeholder'=>'Primeiro Nome')) }}
            </div>

            <div class="form-group">
            {{ Form::label('sobrenome', 'Sobrenome') }}
            {{ Form::text('sobrenome','',array('class'=>'form-control', 'placeholder'=>'Segundo Nome')) }}
            </div>

            <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::email('email','',array('class'=>'form-control', 'placeholder'=>'joao@exemplo.com')) }}
            </div>

            <div class="form-group">
            {{ Form::label('usuario', 'Usuário') }}
            {{ Form::text('usuario','',array('class'=>'form-control', 'placeholder'=>'joao168')) }}
            </div>

            <div class="form-group">
            {{ Form::label('senha', 'Senha') }}
            {{ Form::password('senha', ['class'=>'form-control', 'placeholder'=>'Senha']) }}
            </div>

            <div class="form-group">

            {{ Form::submit('Cadastrar', array('class' => 'btn btn-success')) }}
            </div>

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection