<?php

namespace App\Massoterapia\PacienteCadastro\Http\Validacao;

use \App\Http\Requests\Request;

class PacienteCadastroValidacao extends Request{
    
    protected $nameId = 'id';

    public function authorize() {
        return true;
    }

    public function rules() {

        if ($this->getByid()) {

            return $this->validacaoModoEdicao();
        }

        return $this->validacaoModoCriacao();
    }

    public function messages() {

        return [
            'nomePaciente.required' => 'Campo Nome do paciente é obrigatório',
            'nomePaciente.max' => 'Campo Nome do paciente máximo de 50 caracteres',
            'nomePaciente.min' => 'Campo Nome do paciente mínimo de 10 caracteres',
            
            'cpfPaciente.required' => 'Campo CPF é obrigatório',
            'cpfPaciente.max' => 'Campo CPF máximo de 11 caracteres',
            'cpfPaciente.min' => 'Campo CPF mínimo de 11 caracteres',
            
            'emailPaciente.required' => 'Campo E-mail é obrigatório',
            'emailPaciente.max' => 'Campo E-mail máximo de 50 caracteres',
            'emailPaciente.min' => 'Campo E-mail mínimo de 10 caracteres',
            
            'dataNascimentoPaciente.required' => 'Campo Data de Nascimento é obrigatório',
            'dataNascimentoPaciente.max' => 'Campo Data máximo de 10 caracteres',
            'dataNascimentoPaciente.min' => 'Campo Data mínimo de 10 caracteres',
            
            'sexoPaciente.required' => 'Campo Sexo é obrigatório',
            'sexoPaciente.max' => 'Campo Sexo máximo de 1 caracteres',
            
            
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nomePaciente' => "required|min:10|max:50",
            'cpfPaciente' => "required|min:11|max:11",
            'emailPaciente' => "required|min:10|max:50",
            'dataNascimentoPaciente' => "required|min:10|max:10",
            'sexoPaciente' => "required|min:1|max:1"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nomePaciente' => "required|min:10|max:50",
            'cpfPaciente' => "required|min:11|max:11",
            'emailPaciente' => "required|min:10|max:50",
            'dataNascimentoPaciente' => "required|min:10|max:10",
            'sexoPaciente' => "required|max:1"
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }

}
