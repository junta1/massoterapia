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
            Edição de Usuário
            {{ link_to_route('usuarios.index', 'Voltar', null, array('class' => 'btn btn-info')) }}
        </h3>
        
    </div>
    <div class='row'>
        <div class='col-md-6'>
            {{ Form::model($usuarios,['method' => 'PATCH','route'=>['usuarios.update',$usuarios->id],'class'=>'']) }}

            <div class="form-group">
            {{ Form::label('nome', 'Nome') }}
            {{ Form::text('nome', null, array('class'=>'form-control', 'placeholder'=>'Primeiro Nome', 'autofocus')) }}
            </div>

            <div class="form-group">
            {{ Form::label('sobrenome', 'Sobrenome') }}
            {{ Form::text('sobrenome', null, array('class'=>'form-control', 'placeholder'=>'Segundo Nome')) }}
            </div>

            <div class="form-group">
            {{ Form::label('email', 'E-mail') }}
            {{ Form::email('email', null, array('class'=>'form-control', 'placeholder'=>'joao@exemplo.com')) }}
            </div>

            <div class="form-group">
            {{ Form::label('usuario', 'Usuário') }}
            {{ Form::text('usuario', null, array('class'=>'form-control', 'placeholder'=>'joao168')) }}
            </div>

            <div class="form-group">
            {{ Form::label('senha', 'Senha') }}
            {{ Form::password('senha', ['class'=>'form-control', 'placeholder'=>'Senha']) }}
            </div>

            {{ Form::submit('Atualizar',array('class' => 'btn btn-success')) }}

            {{ Form::hidden('id', $usuarios->id) }}

            {{ Form::close() }}

            {{ Form::open(['method' => 'DELETE','route'=>['usuarios.destroy',$usuarios->id]]) }}

            {{ Form::submit('Excluir',array('class' => 'btn btn-danger')) }}

            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
