@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Medidas do Paciente</h3>
            </div>
            
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('medida-paciente.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar nova medida')) }}</h3>
            </div>
        </div>
    
        <div class='col-md-6'>
            {{ Form::open(array('route' => 'medida-paciente.index','method' => 'post','class'=>'')) }}
            <div class='col-md-6'>
                <h3> {{Form::text('busca',null, array('class'=>'form-control','placeholder'=>'Busca o nome da medida'))}} </h3>
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
                    <th>Nome da Medida</th>
                    <th>Ação</th>
                    </thead>

                    @foreach ($medidaNegocio as $m)
                    <tbody>
                        <tr>
                            <td>{{$m->nome_area_medida}}</td>
                            <td>
                                {{ link_to_route('medida-paciente.edit', '', $m->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar a medida')) }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                    
                </table>
            </div>
        {{--Paginação de itens --}}
        {{$medidaNegocio->links()}}
        </div>
    </div>
</div>
@endsection