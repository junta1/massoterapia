@extends('layout.app')

@section('content')

<H3>Editar Categoria Sintoma</H3>

<div class="table-responsive"/>
<table class="table">

{{ Form::model($sintomaCategoria,['method' => 'PATCH','route'=>['sintoma-categoria.update',$sintomaCategoria->id]]) }}

<thead>
    <th colspan="2">{{ Form::label('nomeCategoria', 'Nome da Categoria') }}</th>
    <th></th>
</thead>

<tr>
    <td colspan="2">{{ Form::text('nomeCategoria') }}</td>
    <td></td>
</tr>

<tr>
    <td>{{ link_to_route('sintoma-categoria.index', 'Voltar', null, array('class' => 'btn btn-default')) }}</td>
    
    <td>
    {{ Form::submit('Atualizar',array('class' => 'btn btn-default')) }}

    {{ Form::hidden('id', $sintomaCategoria->id) }}

    {{ Form::close() }}
    </td>
    
    <td>
    {{ Form::open(['method' => 'DELETE','route'=>['sintoma-categoria.destroy',$sintomaCategoria->id]]) }}

    {{ Form::submit('Excluir',array('class' => 'btn btn-default')) }}

    {{ Form::close() }}
    </td>

</tr>
    {{ Form::close() }}
</table>
</div>

@endsection