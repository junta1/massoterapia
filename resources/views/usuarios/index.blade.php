@extends('layout.app')

@section('content')

{{ link_to_route('usuarios.create', 'Novo', null, array('class' => 'btn btn-default')) }}

{{--
{{ Form::open(array('route' => 'usuarios.show','method' => 'get')) }}
{{ Form::text('campo_pesquisar', null,
                           array('placeholder'=>'Pesquisar usuários..')) }}
{{ Form::submit('Pesquisar') }}
{{ Form::close() }}
--}}
<div class="table-responsive"/>
<table class="table">
    <thead>
    <th>Nome</th>
    <th>Sobrenome</th>
    <th>E-mail</th>
    <th>Usuário</th>
    <th>Criado em</th>
    <th>Atualizado em</th>
    <th colspan="1">Ação</th> 
</thead>

@foreach ($usuarios as $usuario)
<tbody>
    <tr>
        <td>{{$usuario->nome}}</td>
        <td>{{$usuario->sobrenome}}</td>
        <td>{{$usuario->email}}</td>
        <td>{{$usuario->usuario}}</td>
        <td>{{$usuario->created_at}}</td>
        <td>{{$usuario->updated_at}}</td>

        <td>
        {{ link_to_route('usuarios.edit', '', $usuario->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true')) }}
        </td>
        
        </tr>
</tbody>
@endforeach

</table>
</div>

{{--Paginação de itens --}}
{{ $usuarios->links() }}

@endsection