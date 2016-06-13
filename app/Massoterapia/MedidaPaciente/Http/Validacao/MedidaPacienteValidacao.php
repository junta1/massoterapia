<?php

namespace App\Massoterapia\MedidaPaciente\Http\Validacao;

use \App\Http\Requests\Request;

class MedidaPacienteValidacao extends Request{
    
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
            'areaMedida.required' => 'Campo Medida é obrigatório',
            
            'areaMedida.min' => 'Campo Medida precisa de no mínimo 2 caracteres',
            
            'areaMedida.max' => 'Campo Medida precisa de no máximo 50 caracteres'
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'areaMedida' => "required|min:2|max:50"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'areaMedida' => 'required|min:2|max:50'
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }

}
