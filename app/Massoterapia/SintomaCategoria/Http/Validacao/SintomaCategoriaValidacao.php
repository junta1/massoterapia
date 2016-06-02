<?php

namespace App\Massoterapia\SintomaCategoria\Http\Validacao;

use \App\Http\Requests\Request;

class SintomaCategoriaValidacao extends Request{
    
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
            'nomeCategoria.required' => 'Campo Nome da Categoria é obrigatório',
            
            'nomeCategoria.min' => 'Campo mínimo de 2 caracteres',
            
            'nomeCategoria.max' => 'Campo máximo de 50 caracteres'
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nomeCategoria' => "required|min:2|unique:nomeCategoria,{$id}|max:50"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nomeCategoria' => 'required|unique:nomeCategoria|min:2|max:50'
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }

}
