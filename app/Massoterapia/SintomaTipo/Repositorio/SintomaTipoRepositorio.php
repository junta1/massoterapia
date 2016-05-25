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
        return $this->sintomaTipoModel->all();
    }
    
    public function save(array $input) 
    {
        $dado = [
          'nome_sintomas'=> $input['nomeSintomas'],
          'fk_categoria_id'=>$input['categoria']
        ];
        
        return $this->sintomaTipoModel->create($dado);
    }
    
    public function find($id)
    {
        return $this->sintomaTipoModel->find($id);
    }
    
    public function update($id, $input)
    {
        $sintomaTipo = $this->sintomaTipoModel->find($id);
        $sintomaTipo->nome_sintomas = $input['nomeSintomas'];
        $sintomaTipo->fk_categoria_id = $input['categoria'];
        
        return $sintomaTipo->save();
    }
    
    public function delete($id)
    {
        return $this->sintomaTipoModel->destroy($id);
    }
}
