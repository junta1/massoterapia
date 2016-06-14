@extends('layout.app')
@section('content')

<div class="container">

    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Profissional</h3>
            </div>

            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('profissional.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar novo profissional')) }}</h3>
            </div>
        </div>

        <div class='col-md-6'>
            {{ Form::open(array('route' => 'profissional/search','method' => 'post','class'=>'')) }}
            <div class='col-md-6'>
                <h3> {{Form::text('busca',null, array('class'=>'form-control','placeholder'=>'Busca o nome do profissional'))}} </h3>
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
                <th>Nome do Profissional</th>
                <th>Cargo</th>
                <th>Sexo</th>
                <th>Telefone</th>
                <th>Ação</th>
                </thead>

                
                @foreach ($profissional as $p)
                <tbody>
                    <tr>
                        <td>{{$p->nome_profissional}}</td>
                        <td>{{$p->nome_cargo}}</td>
                        <td>
                            @if( ($p->sexo === 'm') || ($p->sexo === 'M') )
                                Masculino
                            @elseif ( ($p->sexo === 'f') || ($p->sexo === 'F') )
                                Feminino
                            @endif
                        </td>
                        
                        <td>{{$p->telefone}}</td>
                        
                        <td>
                            {{ link_to_route('profissional.edit', '', $p->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar o profissional')) }}
                        </td>
                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
        {{--Paginação de itens --}}
        {{$profissional->links()}}
    </div>
</div>
</div>
@endsection