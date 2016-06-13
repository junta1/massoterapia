<?php

namespace App\Massoterapia\ProfissionalCargo\Repositorio;

use App\Massoterapia\ProfissionalCargo\Model\CargoProfissionalModel;

class CargoProfissionalRepositorio
{

    protected $cargoModel;

    public function __construct(CargoProfissionalModel $cargoModel)
    {
        $this->cargoModel = $cargoModel;
    }

    public function all($input = null)
    {
        return $this->cargoModel
                        ->select('id', 'nome_cargo')
                        ->paginate(10);
    }

    public function getWhere(array $input)
    {
        return $this->cargoModel
                        ->select('id', 'nome_cargo')
                        ->where('nome_cargo', 'LIKE', '%' . $input['busca'] . '%')
                        ->paginate(10);
    }

    public function save(array $input)
    {
        $dados = [
            'nome_cargo' => $input['nomeCargo']
        ];

        return $this->cargoModel->create($dados);
    }

    public function find($id)
    {
        return $this->cargoModel
                        ->select('id', 'nome_cargo')
                        ->where('tb_cargo.id', '=', $id)
                        ->first();
    }

    public function update($id, array $input)
    {
        $cargoModel = $this->cargoModel->find($id);
        $cargoModel->nome_cargo = $input['nomeCargo'];

        return $cargoModel->save();
    }

    public function delete($id)
    {
        return $this->cargoModel->destroy($id);
    }

}
