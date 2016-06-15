@extends('layout.app')
@section('content')

<div class="container">
    
    <h1>Resultado</h1>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="3">Dados do Paciente</td>
            </tr>
            <tr>
                <td colspan='2'>
                    {{$consulta['paciente']->nomePaciente}}
                </td>
                <td>
                    {{$consulta['paciente']->cpfPaciente}}
                </td>
            </tr>
            <tr>
                <td>
                    {{$consulta['paciente']->dataNascimentoPaciente}}
                </td>
                <td>
                    {{$consulta['paciente']->sexoPaciente}}
                </td>
                <td>
                    {{$consulta['paciente']->emailPaciente}}
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="2">Dados do Profissional</td>
            </tr>
            <tr>
                <td>
                    {{$consulta['profissional']->nomeProfissional}}
                </td>
                <td>
                    {{$consulta['profissional']->nomeCargo}}
                </td>
            </tr>
        </tbody>
    </table>
    <hr>
    <table class="table table-striped">
        <tbody>
            <tr>
                <td colspan="2">Dados da Consulta</td>
            </tr>
            <tr>
                <td>
                    {{$consulta['consulta']->dataConsulta}}
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection