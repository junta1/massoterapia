<?php

namespace App\Massoterapia\PacienteCadastro\Repositorio;

use App\Massoterapia\PacienteCadastro\Model\PacienteCadastroModel;

class PacienteCadastroRepositorio 
{
    protected $pacienteCadastroModel;
    
    public function __construct(PacienteCadastroModel $pacienteCadastroModel) 
    {
        $this->pacienteCadastroModel = $pacienteCadastroModel;
    }
    
    public function all()
    {
        return $this->pacienteCadastroModel->select('tb_cadastro_paciente.*')->paginate(10);
    }
    
    public function save(array $input)
    {
        $dados =[
            'nome_pac' => $input['nomePaciente'],
            'cpf_pac' => $input['cpfPaciente'],
            'email_pac' => $input['emailPaciente'],
            'nascimento_pac' => $input['dataNascimentoPaciente'],
            'sexo_pac' => $input['sexoPaciente']
        ];
        
        return $this->pacienteCadastroModel->create($dados);
    }
    
    public function find($id)
    {
        return $this->pacienteCadastroModel->find($id);
    }
    
    public function update($id, array $input) 
    {
        $paciente = $this->pacienteCadastroModel->find($id); 
        $paciente->nome_pac = $input['nomePaciente'];
        $paciente->cpf_pac = $input['cpfPaciente'];
        $paciente->email_pac = $input['emailPaciente'];
        $paciente->nascimento_pac = $input['dataNascimentoPaciente'];
        $paciente->sexo_pac = $input['sexoPaciente'];
   
        return $paciente->save();
    }
    
    public function delete($id)
    {
        return $this->pacienteCadastroModel->destroy($id);
    }
}
