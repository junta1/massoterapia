<?php

namespace App\Massoterapia\SintomaTipo\Repositorio;

use App\Massoterapia\SintomaTipo\Model\SintomaTipoModel;

class SintomaTipoRepositorio 
{
    protected $sintomaTipoModel;
   
    public function __construct(SintomaTipoModel $sintomaTipoModel)
    {
        $this->sintomaTipoModel = $sintomaTipoModel;
    }
    
    public function all() 
    {
        return $this->sintomaTipoModel
                 ->select('tb_sintomas_categoria.nome_categoria','tb_sintomas.*')
                 ->join('tb_sintomas_categoria','tb_sintomas.fk_categoria_id','=','tb_sintomas_categoria.id')
                 ->paginate(10);
    }
    
    public function save(array $input) 
    {
        $dado = [
          'nome_sintomas'=> $input['nomeSintomas'],
          'fk_categoria_id'=>$input['nomeCategoria']
        ];
        return $this->sintomaTipoModel->create($dado);
    }
    
    public function find($id)
    {
         return $this->sintomaTipoModel
                 ->select('tb_sintomas_categoria.*','tb_sintomas.*')
                 ->join('tb_sintomas_categoria','tb_sintomas.fk_categoria_id','=','tb_sintomas_categoria.id')
                 ->where('tb_sintomas.id','=',$id)
                 ->first();
    }
    
    public function update($id, array $input)
    {
        $sintomaTipo = $this->sintomaTipoModel->find($id);
        $sintomaTipo->nome_sintomas = $input['nomeSintomas'];
        $sintomaTipo->fk_categoria_id = $input['nomeCategoria'];
        
        return $sintomaTipo->save();
                
    }
    
    public function delete($id)
    {
        return $this->sintomaTipoModel->destroy($id);
    }
}
