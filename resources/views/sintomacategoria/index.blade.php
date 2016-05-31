@extends('layout.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class='col-md-6'>
            <div class='col-md-10'>
                <h3>Lista das Categorias</h3>
            </div>
            <div class='col-md-2' text-center>
                <h3>{{ link_to_route('sintoma-categoria.create', 'Novo', null, array('class' => 'btn btn-primary', 'data-toggle'=>'tooltip', 'title'=>'Criar nova categoria')) }}</h3>
            </div>
        </div>
    </div>
    
    <div class='row'>
        <div class='col-md-12'>

            <div class="table-responsive"/>
                <table class="table">
                    <thead>
                    <th>Nome da Categoria</th>
                    <th>Ação</th> 
                    </thead>

                    @foreach ($sintomaCategoria as $sc)
                    <tbody>
                        <tr>
                            <td>{{$sc->nome_categoria}}</td>
                            <td>
                                {{ link_to_route('sintoma-categoria.edit', '', $sc->id, array('class' => 'glyphicon glyphicon-edit', 'aria-hidden'=>'true', 'data-toggle'=>'tooltip', 'title'=>'Editar a categoria')) }}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {{--Paginação de itens --}}
        {{$sintomaCategoria->links()}}
    </div>
</div>

@endsection