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
        $busca = $this->pacienteCadastroModel
                ->select('id', 'nome_pac', 'cpf_pac', 'email_pac', 'nascimento_pac', 'sexo_pac')
                ->paginate(10);

        return $busca;
    }

    public function getWhere(array $input)
    {
        $busca = $this->pacienteCadastroModel
                ->select('id', 'nome_pac', 'cpf_pac', 'email_pac', 'nascimento_pac', 'sexo_pac')
                ->where('nome_pac', 'LIKE', '%' . $input['busca'] . '%')
                ->orWhere('cpf_pac', 'LIKE', '%' . $input['busca'] . '%')
                ->orWhere('email_pac', 'LIKE', '%' . $input['busca'] . '%')
                ->orderBy('nome_pac', 'ASC')
                ->paginate(10);

        return $busca;
    }

    public function save(array $input)
    {
        $dados = [
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
        $paciente->nascimento_pac = $this->tratarData($input['dataNascimentoPaciente']);
        $paciente->sexo_pac = $input['sexoPaciente'];

        return $paciente->save();
    }

    public function delete($id)
    {
        return $this->pacienteCadastroModel->destroy($id);
    }
    
    protected function tratarData($data)
    {
        return implode('-', array_reverse(explode('/', $data)));
    }

}
