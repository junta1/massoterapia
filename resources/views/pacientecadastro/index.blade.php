@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Lista dos Pacientes</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('paciente-cadastro.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar novo Paciente')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class='col-md-6'>
            {{ Form::open(array('url' => 'paciente-cadastro/search','method' => 'post','class'=>'')) }}
            
            {{Form::text('busca',null, array('class'=>'form-control'))}}
            
            {{Form::submit('Buscar',array('class' => 'btn btn-success'))}}
           
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
                    <th>E-mail</th>
                    <th>Data de nascimento</th>
                    <th>Sexo</th>
                    
                    <th>Ação</th>
                    </thead>

                    @foreach ($pacienteCadastro as $pc)
                    <tbody>
                        <tr>
                            <td>{{$pc->nome_pac}}</td>
                            <td>{{$pc->cpf_pac}}</td>
                            <td>{{$pc->email_pac}}</td>
                            <td>{{$pc->nascimento_pac}}</td>
                            <td>{{$pc->sexo_pac}}</td>
                            
                            <td>
                                {{ link_to_route('paciente-cadastro.edit', '', $pc->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar o Paciente')) }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {{--Paginação de itens --}}
        {{$pacienteCadastro->links()}}
    </div>
</div>
@endsection