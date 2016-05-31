<?php

namespace App\Massoterapia\SintomaCategoria;

use App\Massoterapia\SintomaCategoria\Repositorio\SintomaCategoriaRepositorio;

class SintomaCategoria 
{
    
    protected $sintomaCategoriaRepositorio;
    
    public function __construct(SintomaCategoriaRepositorio $sintomaCategoriaRepositorio) {
        $this->sintomaCategoriaRepositorio = $sintomaCategoriaRepositorio;
    }
    
    public function all()
    {
        return $this->sintomaCategoriaRepositorio->all();
    }
    
    public function save(array $input)
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

    public function update($id, array $input) 
    {
        return $this->sintomaCategoriaRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->sintomaCategoriaRepositorio->delete($id);
    }
       
}
