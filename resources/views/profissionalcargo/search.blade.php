@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Cargo do profissional</h3>
            </div>

            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional-cargo.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar novo cargo')) }}</h3>
            </div>
        </div>

        <div class='col-md-6'>
            {{ Form::open(array('route' => 'profissional-cargo/search','method' => 'post','class'=>'')) }}
            <div class='col-md-6'>
                <h3> {{Form::text('busca',null, array('class'=>'form-control','placeholder'=>'Busca o nome do cargo'))}} </h3>
            </div>

            <div class='col-md-2' text-center>
                <h3>{{Form::submit('Buscar',array('class' => 'btn btn-info'))}}</h3>
            </div>

            {{ Form::close() }}

        </div>
    </div>

    <div class='row'>
        <div class='col-md-12'>
            <div class="table-responsive"/>
            <table class="table">
                <thead>
                <th>Nome do Cargo</th>
                <th>Ação</th>
                </thead>

                @foreach ($cargo as $c)
                <tbody>
                    <tr>
                        <td>{{$c->nome_cargo}}</td>
                        <td>
                            {{ link_to_route('profissional-cargo.edit', '', $c->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar o cargo')) }}
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
        {{--Paginação de itens --}}
        {{$cargo->links()}}
    </div>
</div>
</div>
@endsection