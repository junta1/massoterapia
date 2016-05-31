@extends('layout.app')

@section('content')
<div class="container">

    <div class="row">
        <div class='col-md-12'>
            <div class='col-md-10'>
                <h3>Lista dos Sintomas com Categoria</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-tipo.create', 'Novo', null, array('class' => 'btn btn-primary')) }}</h3>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-md-12'>
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
                            <td>
                                {{ link_to_route('sintoma-tipo.edit', '', $st->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true')) }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection