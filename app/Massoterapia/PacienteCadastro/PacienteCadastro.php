<?php

namespace App\Massoterapia\PacienteCadastro;

use App\Massoterapia\PacienteCadastro\Repositorio\PacienteCadastroRepositorio;

class PacienteCadastro
{

    protected $pacienteCadastroRepositorio;

    public function __construct(PacienteCadastroRepositorio $pacienteCadastroRepositorio)
    {
        $this->pacienteCadastroRepositorio = $pacienteCadastroRepositorio;
    }

    public function all($input = null)
    {
        if (!is_null($input)) {
            return $this->pacienteCadastroRepositorio->getWhere($input);
        }
        return $this->pacienteCadastroRepositorio->all();
    }

    public function save(array $input)
    {

        return $this->pacienteCadastroRepositorio->save($input);
    }

    public function find($id)
    {
        $paciente = $this->pacienteCadastroRepositorio->find($id);
        $dados = new \stdClass();
        $dados->idPaciente = $paciente->id;
        $dados->nomePaciente = $paciente->nome_pac;
        $dados->cpfPaciente = $paciente->cpf_pac;
        $dados->emailPaciente = $paciente->email_pac;
        $dados->dataNascimentoPaciente = $paciente->nascimento_pac;
        $dados->sexoPaciente = $paciente->sexo_pac;

        return $dados;
    }

    public function update($id, array $input)
    {
        return $this->pacienteCadastroRepositorio->update($id, $input);
    }

    public function delete($id)
    {
        return $this->pacienteCadastroRepositorio->delete($id);
    }

    function inverteData($data)
    {
        if (count(explode("/", $data)) > 1) {
            return implode("-", array_reverse(explode("/", $data)));
        } elseif (count(explode("-", $data)) > 1) {
            return implode("/", array_reverse(explode("-", $data)));
        }
    }

    protected function validaCPF($cpf)
    {

        // Elimina possivel mascara
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11
        if (strlen($cpf) != 11) {
            throw new \AppException('CPF inválido');
        }
        // Verifica se nenhuma das sequências invalidas abaixo
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            throw new \AppException('CPF inválido');
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;

                if ($cpf{$c} != $d) {
                    throw new \AppException('CPF inválido');
                }
            }

            return true;
        }
    }

}
