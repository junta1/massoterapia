@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Listas das consultas</h3>
            </div>
        </div>
    
        <div class='col-md-6'>
            {{ Form::open(array('url' => 'consulta/search','method' => 'post','class'=>'')) }}
            <div class='col-md-6'>
                <h3> {{Form::text('busca',null, array('class'=>'form-control','placeholder'=>'Busca o nome, cpf ou data'))}} </h3>
            </div>
            
            <div class='col-md-2' text-center>
                <h3>{{Form::submit('Buscar',array('class' => 'btn btn-info'))}}
                </h3>
            </div>
            
            {{ Form::close() }}
            
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>
            <div class="table-responsive"/>
                <table class="table">
                    <thead>
                    <th>#</th>
                    <th>Nome do Paciente</th>
                    <th>CPF</th>
                    <th>Profissional Responsável</th>
                    <th>Cargo</th>
                    <th>Data da consulta</th>
                    <th>Ações</th>
                    </thead>

                    @foreach ($consulta as $key => $c)
                    <tbody>
                        <tr>
                            <td>{{($key + 1)}}</td>
                            <td>{{$c->nome_pac}}</td>
                            <td>{{$c->cpf_pac}}</td>
                            <td>{{$c->nome_profissional}}</td>
                            <td>{{$c->nome_cargo}}</td>
                            <td>{{date('d/m/Y', strtotime($c->data_consulta))}}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{'atendimento-consulta/index/' . $c->id}}" role="button">
                                    <span class='glyphicon glyphicon-th-list'></span>
                                </a>
                                <a class="btn btn-success btn-sm" href="{{'resultado-consulta/index/' . $c->id}}" role="button">
                                    <span class='glyphicon glyphicon-eye-open'></span>
                                </a>
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
