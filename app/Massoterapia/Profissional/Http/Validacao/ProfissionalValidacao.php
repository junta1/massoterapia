<?php

namespace App\Massoterapia\Profissional\Http\Validacao;

use Illuminate\Foundation\Http\FormRequest;

class ProfissionalValidacao extends FormRequest
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
            'nomeProfissional.required' => 'Campo Profissional é obrigatório',
            'nomeProfissional.min' => 'Campo Profissional mínimo de 2 caracteres',
            'nomeProfissional.max' => 'Campo Profissional máximo de 50 caracteres',
            
            'sexoProfissional.required' => 'Campo Sexo é obrigatório',
            'sexoProfissional.max' => 'Campo Sexo máximo de 1 caracteres',
            
            'telefoneProfissional.required' => 'Campo Telefone é obrigatório',
            'telefoneProfissional.min' => 'Campo Telefone mínimo de 2 caracteres',
            'telefoneProfissional.max' => 'Campo Telefone máximo de 50 caracteres',
            
            'idCargo.required' => 'Campo Cargo é obrigatório'
            
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nomeProfissional' => "required|min:2|max:50",
            'sexoProfissional' => "required|max:1",
            'telefoneProfissional' => "required|min:2|max:20",
            'idCargo' => "required"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nomeProfissional' => "required|min:2|max:50",
            'sexoProfissional' => "required|max:1",
            'telefoneProfissional' => "required|min:2|max:20",
            'idCargo' => "required"
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }
}
