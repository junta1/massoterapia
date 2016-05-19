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

<H3>Cadastro de Usuário</H3>

<div class="table-responsive"/>
<table class="table">

    {{ Form::open(array('route' => 'usuarios.store','method' => 'post')) }}

    <thead>
    <th>{{ Form::label('nome', 'Nome') }}</th>
    <th>{{ Form::label('sobrenome', 'Sobrenome') }}</th>
    <th>{{ Form::label('email', 'Email') }}</th>

    <th>{{ Form::label('usuario', 'Usuário') }}</th>
    <th>{{ Form::label('senha', 'Senha') }}</th>
    </thead>

<tr>
    <td>{{ Form::text('nome') }}</td>
    <td>{{ Form::text('sobrenome') }}</td>
    <td>{{ Form::email('email') }}</td>
    <td>{{ Form::text('usuario') }}</td>
    <td>{{ Form::password('senha') }}</td>
</tr>

<tr>
    <td>{{ link_to_route('usuarios.index', 'Voltar', null, array('class' => 'btn btn-default')) }}</td>
    <td>{{ Form::submit('Cadastrar',array('class' => 'btn btn-default', )) }}</td>
    <td colspan="3"></td>
</tr>

{{ Form::close() }}

</table>
</div>
@endsection