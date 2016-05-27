@extends('layout.app')

@section('content')

<div class="panel panel-default">
  <div class="panel-heading">Cadastro de Sintoma Categoria</div>
  <div class="panel-body">
    Na categoria sintomas, serão definidos os nomes que representarão os tipos dos sintomas.
    <br>Exemplo: Tratamento ou Hábito.
  </div>
</div>

<div class="table-responsive"/>
<table class="table">

    {{ Form::open(array('route' => 'sintoma-categoria.store','method' => 'post')) }}

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
    <td>{{ Form::submit('Cadastrar',array('class' => 'btn btn-default', )) }}</td>
</tr>

{{ Form::close() }}

</table>
</div>

@endsection