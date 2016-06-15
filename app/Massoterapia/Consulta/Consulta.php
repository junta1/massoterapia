<?php

namespace App\Massoterapia\Consulta;

use App\Massoterapia\Consulta\Repositorio\ConsultaRepositorio;

class Consulta
{

    protected $consultaRepositorio;

    public function __construct(ConsultaRepositorio $consultaRepositorio)
    {
        $this->consultaRepositorio = $consultaRepositorio;
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
    
    protected function tratarOutput($d)
    {
        return [
            'dataConsulta' => $d->data_consulta,
            'nomePaciente' => $d->fk_cadastro_paciente_id,
            'nomeProfissional' => $d->fk_profissional_id
        ];
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
        $dados->dataConsulta = $consulta->data_consulta;
        $dados->nomePaciente = $consulta->nome_pac;
        $dados->nomeProfissional = $consulta->nome_profissional;
        $dados->idProfissional = $consulta->fk_profissional_id;

        return $dados;

//        return $this->consultaRepositorio->find($id);
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
