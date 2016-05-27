@extends('layout.app')

@section('content')

{{ link_to_route('sintoma-tipo.create', 'Novo', null, array('class' => 'btn btn-default')) }}

<div class="table-responsive"/>
<table class="table">
    <thead>
    <th>Categoria</th>
    <th>Tipo de Sintoma</th>
    <th>Ação</th>
</thead>

@foreach ($sintomaTipo as $st)
<tbody>
    <tr>
        <td>{{$st->nome_categoria}}</td>
        <td>{{$st->nome_sintomas}}</td>
        <td></td>
    </tr>
</tbody>
@endforeach

</table>
</div>


@endsection