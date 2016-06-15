<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SintomasRelatoriosValidacao extends FormRequest
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
            'sintomaResposta.required' => 'Campo Resposta é obrigatório',
            'sintomaResposta.min' => 'Campo Resposta mínimo de 3 caracteres',
            'sintomaResposta.max' => 'Campo Resposta máximo de 3 caracteres',
            
            'codConsulta.required' => 'Campo Consulta é obrigatório',
            
            'codSintomas.required' => 'Campo Sintomas é obrigatório'
        ];
    }

    protected function validacaoModoEdicao() {

        $id = $this->getByid();

        return [
            'sintomaResposta' => "required|min:3|max:3",
            'codConsulta' => "required",
            'codSintomas' => "required"
        ];
    }

    protected function validacaoModoCriacao() {

        return [
            'sintomaResposta' => "required|min:3|max:3",
            'codConsulta' => "required",
            'codSintomas' => "required"
        ];
    }

    protected function getByid() {

        return $this->request->get($this->nameId);
    }
}
