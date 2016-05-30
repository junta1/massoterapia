<?php

namespace App\Massoterapia\SintomaTipo\Http\Validacao;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
            'nome.required' => 'Campo nome obrigatório',
            'sobrenome.required' => 'Campo sobrenome obrigatório',
            'email.required' => 'Campo e-mail obrigatório',
            'usuario.required' => 'Campo usuario obrigatório',
            'senha.required' => 'Campo senha obrigatório',
            
            'nome.min' => 'Campo mínimo de 1 caracteres',
            'sobrenome.min' => 'Campo mínimo de 1 caracteres',
            'usuario.min' => 'Campo mínimo de 6 caracteres',
            'senha.min' => 'Campo mínimo de 6 caracteres',
            
            'nome.max' => 'Campo máximo de 50 caracteres',
            'sobrenome.max' => 'Campo máximo de 80 caracteres',
            'usuario.max' => 'Campo máximo de 20 caracteres',
            'senha.max' => 'Campo máximo de 20 caracteres',
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'nome' => 'required|min:1|max:50',
            'sobrenome' => 'required|min:1|max:80',
            'email' => "required|unique:usuarios,email,{$id}|max:255|email",
            'usuario' => "unique:usuarios,usuario,{$id}|min:6|max:20'"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'nome' => 'required|max:255',
            'sobrenome' => 'required|max:255',
            'email' => 'required|unique:usuarios|max:255|email',
            'usuario' => 'unique:usuarios|max:20',
            'senha' => 'required|max:32',
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }
    
}
