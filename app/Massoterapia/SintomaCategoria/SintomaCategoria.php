<?php

namespace App\Massoterapia\SintomaCategoria;

use App\Massoterapia\SintomaCategoria\Repositorio\SintomaCategoriaRepositorio;

class SintomaCategoria 
{
    
    protected $sintomaCategoriaRepositorio;
    
    public function __construct(SintomaCategoriaRepositorio $sintomaCategoriaModel) {
        $this->sintomaCategoriaRepositorio = $sintomaCategoriaModel;
    }
    
    public function all()
    {
        return $this->sintomaCategoriaRepositorio->all();
    }
    
    public function save($input)
    {
        $dado = [
          'nome_categoria'=> $input['nomeCategoria']  
        ];
        
        return $this->sintomaCategoriaRepositorio->save($dado);
    }
}
