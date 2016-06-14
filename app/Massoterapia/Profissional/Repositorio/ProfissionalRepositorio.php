<?php

namespace App\Massoterapia\Profissional\Repositorio;

use App\Massoterapia\Profissional\Model\ProfissionalModel;

class ProfissionalRepositorio
{
    protected $profissionalModel;
    
    public function __construct(ProfissionalModel $profissionalModel)
    {
        $this->profissionalModel = $profissionalModel;
    }
    
    public function all($input = null)
    {
        $campos = [
            'tb_profissional.id',
            'tb_profissional.nome_profissional',
            'tb_profissional.sexo',
            'tb_profissional.telefone',
            'tb_cargo.nome_cargo'
        ];
        
        $busca = $this->profissionalModel
                        ->select($campos)
                        ->join('tb_cargo','tb_cargo.id','=','tb_profissional.fk_cargo_id')
                        ->orderBy('tb_profissional.nome_profissional','ASC')
                        ->paginate(10);
        return $busca;
    }
    
    public function getWhere(array $input)
    {
        $campos = [
            'tb_profissional.id',
            'tb_profissional.nome_profissional',
            'tb_profissional.sexo',
            'tb_profissional.telefone',
            'tb_cargo.nome_cargo'
        ];
        
        $busca = $this->profissionalModel
                        ->select($campos)
                        ->join('tb_cargo','tb_cargo.id','=','tb_profissional.fk_cargo_id')
                        ->orderBy('tb_profissional.nome_profissional','ASC')
                        ->where('tb_profissional.nome_profissional', 'LIKE', '%' . $input['busca'] . '%')
                        ->paginate(10);
        return $busca;
    }
    
    public function save(array $input)
    {
        $dados = [
            'nome_profissional' => $input['nomeProfissional'],
            'sexo' => $input['sexoProfissional'],
            'telefone' => $input['telefoneProfissional'],
            'fk_Cargo_id' => $input['idCargo'],
        ];

        return $this->profissionalModel->create($dados);
    }
    
    public function find($id)
    {
        $campos = [
            'tb_profissional.id',
            'tb_profissional.nome_profissional',
            'tb_profissional.sexo',
            'tb_profissional.telefone',
            'tb_cargo.nome_cargo'
        ];
        
        $busca = $this->profissionalModel
                        ->select($campos)
                        ->join('tb_cargo','tb_cargo.id','=','tb_profissional.fk_cargo_id')
                        ->orderBy('tb_profissional.nome_profissional','ASC')
                        ->where('tb_profissional.id','=',$id)
                        ->first();
        return $busca;               
    }
    
    public function update($id, array $input)
    {
        $profissional = $this->profissionalModel->find($id);
        $profissional->nome_profissional = $input['nomeProfissional'];
        $profissional->sexo = $input['sexoProfissional'];
        $profissional->telefone = $input['telefoneProfissional'];
        $profissional->fk_cargo_id = $input['idCargo'];
        
        return $profissional->save();
    }
    
    public function delete($id)
    {
        return $this->profissionalModel->destroy($id);
    }
}
