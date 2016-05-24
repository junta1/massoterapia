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
        return $this->sintomaCategoriaRepositorio->save($input);
    }
    
    public function find($id) 
    {
        $sintoma = $this->sintomaCategoriaRepositorio->find($id);
        $dados = new \stdClass();
        $dados->id = $sintoma->id;
        $dados->nomeCategoria = $sintoma->nome_categoria;
        return $dados;
    }

    public function update($id, $input) 
    {
        return $this->sintomaCategoriaRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->sintomaCategoriaRepositorio->delete($id);
    }
       
}
