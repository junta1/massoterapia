@extends('layout.app')

@section('content')

<H3>Edição de Usuário</H3>

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

<div class="table-responsive"/>
<table class="table">

{{ Form::model($usuarios,['method' => 'PATCH','route'=>['usuarios.update',$usuarios->id]]) }}

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
    
    <td>
    {{ Form::submit('Atualizar',array('class' => 'btn btn-default')) }}

    {{ Form::hidden('id', $usuarios->id) }}

    {{ Form::close() }}
    </td>
    
    <td>
    {{ Form::open(['method' => 'DELETE','route'=>['usuarios.destroy',$usuarios->id]]) }}

    {{ Form::submit('Excluir',array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
    </td>

    <td colspan=""></td>
</tr>

</table>
</div>


@endsection
