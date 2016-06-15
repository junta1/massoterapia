@extends('layout.app')
@section('content')

<div class="container">
    
    <h1>Resultado</h1>
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
                    <span style='font-weight: bold;'>Dados do Profissional</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Nome: </strong>{{$consulta['profissional']->nomeProfissional}}
                </td>
                <td>
                    <strong>Cargo: </strong>{{$consulta['profissional']->nomeCargo}}
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
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="2">
                    <span style='font-weight: bold;'>Questionário</span>
                </td>
            </tr>
            @foreach ($consulta['respostas'] as $r)
                <tr>
                    <td>
                        <strong>{{$r->nome_sintomas}}</strong>
                    </td>
                    <td>
                        {{$r->sintoma_resposta}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection