@extends('layout.app')
@section('content')

<div class="container">
    
    <h1>Atendimento</h1>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="3">
                    <span style='font-weight: bold;'>Dados do Paciente</span>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <strong>Nome: </strong>{{$consulta['paciente']->nomePaciente}}
                </td>
                <td>
                    <strong>CPF: </strong>{{$consulta['paciente']->cpfPaciente}}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Data de Nascimento: </strong>{{$consulta['paciente']->dataNascimentoPaciente}}
                </td>
                <td>
                    <strong>Sexo: </strong><span style='text-transform: uppercase;'>{{$consulta['paciente']->sexoPaciente}}</span>
                </td>
                <td>
                    <strong>Email: </strong>{{$consulta['paciente']->emailPaciente}}
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    <span style='font-weight: bold;'>Dados da Consulta</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Data: </strong>{{$consulta['consulta']->dataConsulta}}
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <hr>
    <h3>Questionário</h3>
    {{ Form::open(array('url' => 'atendimento-consulta','method' => 'post')) }}
            
    @foreach ($consulta['sintomas'] as $s)
        <div class="form-group">
            {{ Form::label('nomeSintoma' . $s->id, $s->nome_sintomas) }}
            {{ Form::text("resposta[{$s->id}]", null, array('class'=>'form-control'))  }}
        </div>
    @endforeach
    
    {{Form::hidden('idConsulta', $consulta['consulta']->id)}}

    {{ Form::submit('Cadastrar', array('class' => 'btn btn-success')) }}

    {{ Form::close() }}
</div>
@endsection
