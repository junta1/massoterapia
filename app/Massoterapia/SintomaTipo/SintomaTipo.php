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
        return $this->sintomaTipoRepositorio->all();
    }
    
    public function save(array $input)
    {
        return $this->sintomaTipoRepositorio->save($input);
    }
    
    public function find($id)
    {
        $especifico = $this->sintomaTipoRepositorio->find($id);
        
//        if (!$especifico) {
//            throw new Exception('Dados dos sintomas não encontrados!');
//        }
        
        return $this->tratarDadosFind($especifico);
    }
    
    public function tratarDadosFind($dadosMostrar)
    {
        return [
            'id' => $dadosMostrar->id,    
            'nomeSintomas' => $dadosMostrar->nome_sintomas,
            'nomeCatgeoria' => $dadosMostrar->nome_categoria
        ];
    }
    
    public function update($id, array $input)
    {
        return $this->sintomaTipoRepositorio->update($id, $input);
    }
    
    public function delete($id)
    {
        return $this->sintomaTipoRepositorio->delete($id);
    }
}