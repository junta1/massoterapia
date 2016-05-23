@extends('layout.app')

@section('content')

{{ link_to_route('sintoma-categoria.create', 'Novo', null, array('class' => 'btn btn-default')) }}

<div class="table-responsive"/>
<table class="table">
    <thead>
    <th>Nome da Categoria</th>
    <th>Criado em</th>
    <th>Atualizado em</th>
    <th colspan="1">Ação</th> 
</thead>

@foreach ($sintomaCategoria as $sc)
<tbody>
    <tr>
        <td>{{$sc->nome_categoria}}</td>
        <td>{{$sc->created_at}}</td>
        <td>{{$sc->updated_at}}</td>
        <td>
        {{ link_to_route('sintoma-categoria.edit', '', $sc->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true')) }}
        </td>
    </tr>
</tbody>
@endforeach

</table>
</div>

{{--Paginação de itens --}}
{{$sintomaCategoria->links()}}

@endsection