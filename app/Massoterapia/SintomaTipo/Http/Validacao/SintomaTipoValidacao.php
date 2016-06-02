<?php

namespace App\Massoterapia\SintomaTipo\Http\Validacao;

use \App\Http\Requests\Request;

class SintomaTipoValidacao extends Request{
    
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
            'nomeSintomas.required' => 'Campo Tipo de Sintomas é obrigatório',
            'nomeCategoria.required' => 'Categoria do Sintoma é obrigatório',
            
            'nomeSintomas.min' => 'Campo Tipo de Sintomas tem o mínimo de 1 caracteres',
            
            'nomeSintomas.max' => 'Campo Tipo de Sintomas tem o máximo de 50 caracteres',
            
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nomeSintomas' => 'required|min:1|max:50',
            'nomeCategoria' => 'required'
        ];
    }

    protected function validacaoModoCriacao() {
        
        return [
            'nomeSintomas' => 'required|max:255',
            'nomeCategoria' => 'required'
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }
    
}
