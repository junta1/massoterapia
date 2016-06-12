@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Listas das consultas</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('consulta.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar nova consulta')) }}</h3>
            </div>
        </div>
    
        <div class='col-md-6'>
            {{ Form::open(array('url' => 'consulta/search','method' => 'post','class'=>'')) }}
            
            <div class='col-md-6'>
                <h3> {{Form::text('busca',null, array('class'=>'form-control','placeholder'=>'Busca data consulta, cpf ou nome'))}} </h3>
            </div>
            
            <div class='col-md-2' text-center>
                <h3>{{Form::submit('Buscar',array('class' => 'btn btn-success'))}}</h3>
            </div>
            
            {{ Form::close() }}
            
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>
            <div class="table-responsive"/>
                <table class="table">
                    <thead>
                    <th>Nome do Paciente</th>
                    <th>CPF</th>
                    <th>Data da consulta</th>
                    
                    <th>Ação</th>
                    </thead>

                    @foreach ($consulta as $c)
                    <tbody>
                        <tr>
                            <td>{{$c->nome_pac}}</td>
                            <td>{{$c->cpf_pac}}</td>
                            <td>{{$c->data_consulta}}</td>
                            <td>
                                {{ link_to_route('consulta.edit', '', $c->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar a consulta')) }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        {{--Paginação de itens --}}
        {{$consulta->links()}}
        </div>
    </div>
</div>
@endsection