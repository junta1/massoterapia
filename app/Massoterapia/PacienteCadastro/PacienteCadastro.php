<?php

namespace App\Massoterapia\PacienteCadastro;

use App\Massoterapia\PacienteCadastro\Repositorio\PacienteCadastroRepositorio;

class PacienteCadastro 
{
    protected $pacienteCadastroRepositorio;
    
    public function __construct(PacienteCadastroRepositorio $pacienteCadastroRepositorio)
    {
        $this->pacienteCadastroRepositorio = $pacienteCadastroRepositorio;
    }
    
    public function all()
    {
        return $this->pacienteCadastroRepositorio->all();
    }
    
    public function save(array $input)
    {
        return $this->pacienteCadastroRepositorio->save($input);
    }
    
    public function find($id)
    {
        $paciente = $this->pacienteCadastroRepositorio->find($id);
        $dados = new \stdClass();
        $dados->id = $paciente->id;
        $dados->nomePaciente = $paciente->nome_pac;
        $dados->cpfPaciente = $paciente->cpf_pac;
        $dados->emailPaciente = $paciente->email_pac;
        $dados->dataNascimentoPaciente = $paciente->nascimento_pac;
        $dados->sexoPaciente = $paciente->sexo_pac;
        
        return $dados;
    }
    
    public function update($id, array $input)
    {
        return $this->pacienteCadastroRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->pacienteCadastroRepositorio->delete($id);
    }
}
