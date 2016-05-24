<?php

namespace App\Massoterapia\SintomaCategoria\Repositorio;

use App\Massoterapia\SintomaCategoria\Model\SintomaCategoriaModel;

/**
 * SintomaCategoriaRepositorio { TIPO }
 *  Descricao
 * @copyright (c) 2016, Rafael Mattos
 */
class SintomaCategoriaRepositorio {
    protected $sintomaCategoriaModel;
    
    public function __construct(SintomaCategoriaModel $sintomaCategoriaModel) {
        $this->sintomaCategoriaModel = $sintomaCategoriaModel;
    }
    
    public function all()
    {
        return $this->sintomaCategoriaModel->select('id','nome_categoria','created_at','updated_at')->paginate(10);
    }
    
    public function save(array $input) 
    {
        $dado = [
          'nome_categoria'=> $input['nomeCategoria']  
        ];
        
        return $this->sintomaCategoriaModel->create($dado);
    }
    
    public function find($id) {
        return $this->sintomaCategoriaModel->find($id);
    }
    
    public function update($id, array $input) 
    {
        $sintomaCategoria = $this->sintomaCategoriaModel->find($id);
        $sintomaCategoria->nome_categoria = $input['nomeCategoria'];
        
        return $this->sintomaCategoriaModel->update($sintomaCategoria);
    }
    
    public function delete($id)
    {
        return $this->sintomaCategoriaModel->destroy($id);
    }
    
}
