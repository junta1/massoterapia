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
        return $this->sintomaCategoriaModel->select('id','nome_sintoma')->get();
    }
    
    public function save($input) 
    {
        
    }
}
