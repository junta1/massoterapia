<?php

namespace App\Massoterapia\SintomaTipo;

use App\Massoterapia\SintomaTipo\Repositorio\SintomaTipoRepositorio;

class SintomaTipo
{
    protected $sintomaTipoRepositorio;
    
    public function __construct(SintomaTipoRepositorio $sintomaTipoRepositorio) {
        $this->sintomaTipoRepositorio = $sintomaTipoRepositorio;
    }
    
    public function all()
    {
        $this->sintomaTipoRepositorio->all();
    }
    
    public function save($input)
    {
        $this->sintomaTipoRepositorio->save($input);
    }
    
    public function find($id)
    {
        $especifico = $this->sintomaTipoRepositorio->find($id);
        $sintomaEspecifico = new \stdClass();
        $sintomaEspecifico->id = $especifico->id;
        $sintomaEspecifico->nomeSintomas = $especifico->nome_sintomas;
        
        return $sintomaEspecifico;
    }
    
    public function update($id, array $input)
    {
        return $this->sintomaTipoRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        $this->sintomaTipoRepositorio->delete($id);
    }
}
