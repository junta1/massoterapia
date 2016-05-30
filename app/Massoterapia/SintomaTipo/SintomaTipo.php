<?php

namespace App\Massoterapia\SintomaTipo;

use App\Massoterapia\SintomaTipo\Repositorio\SintomaTipoRepositorio;

class SintomaTipo
{
    protected $sintomaTipoRepositorio;
    
    protected $sintomaCategoriaModel;
    protected $sintomaCategoriaRepositorio;
    protected $sintomaCategoriaNegocio;
    
    public function __construct(SintomaTipoRepositorio $sintomaTipoRepositorio) {
        $this->sintomaTipoRepositorio = $sintomaTipoRepositorio;
    }
    
    public function allCategoria()
    {
        $this->sintomaCategoriaModel = new \App\Massoterapia\SintomaCategoria\Model\SintomaCategoriaModel;
        $this->sintomaCategoriaRepositorio = new \App\Massoterapia\SintomaCategoria\Repositorio\SintomaCategoriaRepositorio($this->sintomaCategoriaModel);
        $this->sintomaCategoriaNegocio = new \App\Massoterapia\SintomaCategoria\SintomaCategoria($this->sintomaCategoriaRepositorio);
        
        return $this->sintomaCategoriaNegocio->all();
    }
    
    public function all()
    {
        return $this->sintomaTipoRepositorio->all();
    }
    
    public function save($input)
    {
        return $this->sintomaTipoRepositorio->save($input);
    }
    
    public function find($id)
    {
        $especifico = $this->sintomaTipoRepositorio->find($id);
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