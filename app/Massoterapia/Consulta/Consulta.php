<?php

namespace App\Massoterapia\Consulta;

use App\Massoterapia\Consulta\Repositorio\ConsultaRepositorio;
use App\Massoterapia\Consulta\Model\ConsultaModel;

class Consulta
{

    protected $consultaRepositorio;

    public function __construct()
    {
        $this->consultaRepositorio = new ConsultaRepositorio(new ConsultaModel());
    }

    public function all($input = null)
    {
        if (!is_null($input)) {
            return $this->consultaRepositorio->getWhere($input);
        }
        
        return $this->consultaRepositorio->all();
        }

    public function profissionalAll()
    {
        $model = new \App\Massoterapia\Profissional\Model\ProfissionalModel();
        $repositorio = new \App\Massoterapia\Profissional\Repositorio\ProfissionalRepositorio($model);
        $negocio = new \App\Massoterapia\Profissional\Profissional($repositorio);
        
        return $negocio->all();
    }
    
    protected function tratarOutput($consulta)
    {
        $dados = new \stdClass();
        $dados->id = $consulta->id;
        $dados->dataConsulta = (!is_null($consulta->data_consulta) ? date('d/m/Y', strtotime($consulta->data_consulta)) : null);
        $dados->nomePaciente = $consulta->nome_pac;
        $dados->cpfPaciente = $consulta->cpf_pac;
        $dados->nomeProfissional = $consulta->nome_profissional;
        $dados->nomeCargo = $consulta->nome_cargo;
        $dados->idProfissional = $consulta->fk_profissional_id;
        $dados->idPaciente = $consulta->id_paciente;

        return $dados;
    }

    public function save($input)
    {
        return $this->consultaRepositorio->save($input);
    }

    public function find($id)
    {
        $consulta = $this->consultaRepositorio->find($id);
        $dados = new \stdClass();
        $dados->id = $consulta->id;
        $dados->dataConsulta = (!is_null($consulta->data_consulta) ? date('d/m/Y', strtotime($consulta->data_consulta)) : null);
        $dados->nomePaciente = $consulta->nome_pac;
        $dados->nomeProfissional = $consulta->nome_profissional;
        $dados->idProfissional = $consulta->fk_profissional_id;
        $dados->idPaciente = $consulta->id_paciente;

        return $dados;
    }

    public function update($id, $input)
    {
        return $this->consultaRepositorio->update($id, $input);
    }

    public function delete($id)
    {
        return $this->consultaRepositorio->delete($id);
    }

    public function paciente($id)
    {
        $pacienteModel = new \App\Massoterapia\PacienteCadastro\Model\PacienteCadastroModel();
        $pacienteRepositorio = new \App\Massoterapia\PacienteCadastro\Repositorio\PacienteCadastroRepositorio($pacienteModel);
        $pacienteNegocio = new \App\Massoterapia\PacienteCadastro\PacienteCadastro($pacienteRepositorio);

        return $pacienteNegocio->find($id);
    }

}
