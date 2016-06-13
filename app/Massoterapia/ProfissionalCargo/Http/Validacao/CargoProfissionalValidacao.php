<?php

namespace App\Massoterapia\ProfissionalCargo\Http\Validacao;

use \App\Http\Requests\Request;

class CargoProfissionalValidacao extends Request
{
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
            'nomeCargo.required' => 'Campo Cargo é obrigatório',
            
            'nomeCargo.min' => 'Campo Cargo mínimo de 2 caracteres',
            
            'nomeCargo.max' => 'Campo Cargo máximo de 50 caracteres'
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nomeCargo' => "required|min:2|max:50"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nomeCargo' => 'required|min:2|max:50'
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }
}
